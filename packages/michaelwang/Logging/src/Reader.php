<?php

namespace Michaelwang\Logging;


class Reader extends Base
{
    /**
     * Constructor
     * @param Options $options
     */
    public function __construct(Options $options)
    {
        parent::__construct($options);
    }

    // Count total records
    public function getTotalCount()
    {
        $meta = $this->_getMeta();
        return $meta->totalCount;
    }

    /**
     * Return records with the SearchOptions
     * @param SearchOptions $options The options for searching
     * @return array
     */
    public function getRecords(SearchOptions $options)
    {
        $results = array();
        $callback = function ($data) use (&$results) {
            $results[] = $data;
        };
        $this->streamRecords($options, $callback);
        return $results;
    }

    /**
     * Stream records with the SearchOptions and the callback function
     * @param SearchOptions $options The options for searching
     * @param function $callback The callback function for handling each record
     * @return array The profiling info of this function
     */
    public function streamRecords(SearchOptions $options, $callback)
    {
        $startTime = microtime(true);
        /* DISABLED
        try {
            // Try searching by index first
            $this->streamRecordsByIndex($options, $callback);
        } catch (Exception $e) {
            // Fallback to the file-based searching if fails
            $this->streamRecordsByFile($options, $callback);
        }
        */
        $info = $this->streamRecordsByFile($options, $callback);
        $info['time_spent'] = microtime(true) - $startTime;
        return $info;
    }

    /** DISABLED
     * Stream records with the SearchOptions and the callback function by index
     * @param SearchOptions $options The options for searching
     * @param function $callback The callback function for handling each record
     */
    /* DISABLED
    public function streamRecordsByIndex(SearchOptions $options, $callback)
    {
        $tnt = new TNTSearch();
        $tnt->loadConfig(array(
            'storage' => $this->_options->indexFile
        ));
        $tnt->selectIndex($this->_options->indexName);
        $res = $tnt->search(implode(' ', array_values($options->conditions)), $options->count);
        var_dump($res);
        die();
    }
    */

    /**
     * Stream records with the SearchOptions and the callback function by file
     * @param SearchOptions $options The options for searching
     * @param function $callback The callback function for handling each record
     * @return array The profiling info of this function
     */
    public function streamRecordsByFile(SearchOptions $options, $callback)
    {
        $info = array();
        $counter = 0;
        $handleFunc = function ($record) use ($options, $callback, &$counter) {
            $hasConditions = (count($options->conditions) > 0);
            $offsetCount = ($hasConditions ? abs($options->offset) : 0);
            // For no-conditions case, the offset has already been fast forwarded before this handleFunc
            // For conditional search, a file scan seeking is unavoidable
            // The $offsetCount will only be enabled when $options has conditions
            if ($options->count > 0 && $counter >= $options->count + $offsetCount) {
                return false;
            }
            // Range: from - to
            if ($options->to > 0 && $options->reverse === 0 && $record->timestamp > $options->to) {
                return false;
            }
            if ($options->from > 0 && $options->reverse !== 0 && $record->timestamp < $options->from) {
                return false;
            }
            // Record matching with conditions
            if ($hasConditions && !$record->matches($options->conditions)) {
                return;  // skip
            }
            $counter++;
            // In the case of options having conditions
            if ($offsetCount > 0 && $counter <= $offsetCount) {
                return;  // skip
            }
            // Pass to the callback handler
            $continue = call_user_func($callback,$record->getData());
            if ($continue === false) {
                return false;
            }
        };
        // Variables
        $isReversed = ($options->reverse !== 0);
        $startPoint = ($isReversed ? $options->to : $options->from);  // in timestamp
        $hasConditions = (count($options->conditions) > 0);
        $info['startPoint'] = $startPoint;
        // Total count
        $totalCount = $this->_getMeta()->totalCount;
        $info['totalCount'] = $totalCount;
        // Retrieve all the log entries
        $entries = $this->_getAllLogEntries();
        $info['entries'] = $entries;
        if (count($entries) === 0) {
            return;
        }
        // Select the first log entry according to the start point
        if ($startPoint > 0) {
            $entry = $this->_getLogEntry($startPoint);
        } elseif ($isReversed) {
            $entry = $entries[count($entries) - 1];  // last entry for reversed reading
        } else {
            $entry = $entries[0];
        }
        $index = array_search($entry, $entries);  // It's impossible to be false
        $skip = 0;
        $step = 0;
        // Fast forward with the offset for no-conditions searching
        if (!$hasConditions && $options->offset !== 0) {
            if ($options->offset > 0) {
                $skip = floor($options->offset / $this->_options->rotationThreshold);
                $step = $options->offset % $this->_options->rotationThreshold;
            } else {
                $lastCount = $totalCount % $this->_options->rotationThreshold;
                $blockOffset = $options->offset + $lastCount;
                if ($blockOffset <= 0) {
                    $skip = floor($blockOffset / $this->_options->rotationThreshold) - 1;  // including the latest entry
                    $step = $blockOffset % $this->_options->rotationThreshold;
                } else {
                    $step = $options->offset;
                }
            }
        }
        $index += $skip;
        if ($index < 0) {
            $index = 0;
        }
        if ($index >= count($entries)) {
            $index = $entries[count($entries) - 1];
        }
        // Open the log file for streaming
        $entry = $entries[$index];
        $info['entry'] = $entry;
        $logFile = $this->_options->dataDir . DIRECTORY_SEPARATOR . $entry;
        $logSFO = new \SplFileObject($logFile, 'r');
        // No records
        if ($logSFO->getSize() < 16) {  // 16 is the minimal length of possible valid record
            $logSFO = null;  // release the resource
            return;
        }
        // Seek to the start point
        if ($startPoint > 0) {
            $this->_seekByTimestamp($logSFO, $startPoint);
        } else if ($isReversed) {
            $logSFO->fseek(0, SEEK_END);  // read from the ending for reversed reading
        }
        // Fast forward with remaining steps of records
        if ($step !== 0) {  // may be negative
            $this->_seekByOffset($logSFO, $step);
        }
        // Start streaming records
        $continuous = false;
        $result = true;
        $info['streaming'] = array();
        while ($result) {
            // Read backward
            if ($isReversed) {
                if ($continuous) {
                    // File ending as the start point for continuous reversed streaming
                    $logSFO->fseek(0, SEEK_END);
                }
                $result = $this->_streamBackward($logSFO, $handleFunc);
                $index--;
            // Read forward
            } else {
                $result = $this->_streamForward($logSFO, $handleFunc);
                $index++;
            }
            $logSFO = null;  // release the resource
            // Stop if explicitly interrupted by $handleFunc
            if (!$result) {
                break;
            }
            // Continue to read the next log
            if ($index >= 0 && $index < count($entries)) {
                $entry = $entries[$index];
                $info['streaming'][] = array(
                    'index' => $index,
                    'entry' => $entry
                );
                $logFile = $this->_options->dataDir . DIRECTORY_SEPARATOR . $entry;
                $logSFO = new \SplFileObject($logFile, 'r');
                $startPoint = 0;
            } else {
                break;
            }
            $continuous = true;
        }
        return $info;
    }

    /**
     * Dump all the records with the callback function
     * @param callable $callback The callback function to process the record
     */
    public function dumpRecords($callback)
    {
        $entries = $this->_getAllLogEntries();
        if (count($entries) === 0 ) {
            return;
        }
        foreach ($entries as $entry) {
            $logFile = $this->_options->dataDir . DIRECTORY_SEPARATOR . $entry;
            $logSFO = new \SplFileObject($logFile, 'r');
            $logSFO->rewind();
            while (!$logSFO->eof()) {
                $line = $logSFO->fgets();
                $record = Record::from($line);
                if (!$record) {
                    continue;
                }
                $callback($record->getData());
            }
            $logSFO = null;  // release the resource
        }
    }

    // Seek by the amount of records in offset from current position
    protected function _seekByOffset(\SplFileObject $fileObject, $offset = 0)
    {
        if ($offset === 0) {
            return 0;
        }
        $counter = 0;
        $callback = function ($record) use (&$counter, $offset) {
            return ($counter++ < (abs($offset) - 1));  // this 1 record has been already read
        };
        if ($offset > 0) {
            $this->_streamForward($fileObject, $callback);
        } else if ($offset < 0) {
            $this->_streamBackward($fileObject, $callback);
        }
        return $fileObject->ftell();
    }

    // Seek to the beginning of the line with the provided timestamp
    protected function _seekByTimestamp(\SplFileObject $fileObject, $timestamp = 0)
    {
        if ($timestamp === 0) {
            return 0;
        }
        // Make sure the timestamp is within the range of this log file
        $fileObject->rewind();
        $firstLine = $this->_readLineForward($fileObject);
        $firstRecord = Record::from($firstLine);
        if ($firstRecord && $firstRecord->timestamp > $timestamp) {
            return 0;
        }
        $fileObject->fseek(0, SEEK_END);
        $lastLine = $this->_readLineBackward($fileObject);
        $lastRecord = Record::from($lastLine);
        if ($lastRecord && $lastRecord->timestamp < $timestamp) {
            $fileObject->fseek(0, SEEK_END);
            return $fileObject->ftell();
        }
        // Coarse seek by binary search
        $fileSize = $fileObject->getSize();
        $jumpOffset = floor($fileSize / 2);
        $lastOffset = 0;
        $lastJumpOffset = 0;
        while (true) {
            if ($jumpOffset === 0) {
                break;
            }
            // Seek to the jump offset
            $fileObject->fseek($jumpOffset, SEEK_SET);
            $this->_readToEOLBackward($fileObject);
            $offset = $fileObject->ftell();
            if ($offset === $lastOffset) {
                break;
            }
            $lastOffset = $offset;
            // Read the record in current position
            $record = null;
            while (!$fileObject->eof()) {
                $line = $this->_readLineForward($fileObject);
                $record = Record::from($line);
                if (!$record) {
                    continue;
                }
                break;
            }
            if (!$record) {
                // No valid records in this log file
                return -1;
            }
            // Check the record in current position
            if ($record->timestamp < $timestamp) {
                $jumpOffset += floor(abs($jumpOffset - $lastJumpOffset) / 2);
            } elseif ($record->timestamp > $timestamp) {
                $jumpOffset -= floor(abs($jumpOffset - $lastJumpOffset) / 2);
            } else {  // equal
                while ($fileObject->ftell() > 0) {
                    $line = $this->_readLineBackward($fileObject);
                    $record = Record::from($line);
                    if (!$record) {
                        continue;
                    }
                    if ($record->timestamp < $timestamp) {
                        break 2;
                    }
                }
                break;
            }
            $lastJumpOffset = $jumpOffset;
        }
        // Fine seek by forward scanning
        while (!$fileObject->eof()) {
            $line = $this->_readLineForward($fileObject);
            $record = Record::from($line);
            if (!$record) {
                continue;
            }
            if ($record->timestamp >= $timestamp) {  // put the cursor to one record back
                $this->_seekToTimestampBackward($fileObject, $timestamp);
                break;
            }
        }
        return $fileObject->ftell();
    }

    // Seek to the first line containing the timestamp in backward
    protected function _seekToTimestampBackward(\SplFileObject $fileObject, $timestamp)
    {
        while ($fileObject->ftell() > 0) {
            $line = $this->_readLineBackward($fileObject);
            $ts = (int) (substr($line, 1, 10));  // extract timestamp value from the beginning of the line
            if ($ts === 0) {
                return -1;  // fails
            }
            if ($ts < $timestamp) {
                $this->_readLineForward($fileObject);
                break;
            }
        }
        return $fileObject->ftell();
    }

    // Stream records from current position in forward
    // returns false if the streaming is interrupted by the callback, true otherwise
    protected function _streamForward(\SplFileObject $fileObject, $callback)
    {
        while (!$fileObject->eof()) {
            $line = $this->_readLineForward($fileObject);
            if (!$line) {
                break;
            }
            $record = Record::from($line);
            if (!$record) {
                $fileObject->next();
                continue;
            }
            if ($callback($record) === false) {
                return false;
            }
            $fileObject->next();
        }
        return true;
    }

    // Stream records from current position in backward
    // returns false if the streaming is interrupted by the callback, true otherwise
    protected function _streamBackward(\SplFileObject $fileObject, $callback)
    {
        while ($fileObject->ftell() > 0) {
            $line = $this->_readLineBackward($fileObject);
            if (!$line) {
                break;
            }
            $record = Record::from($line);
            if (!$record) {
                continue;
            }
            if ($callback($record) === false) {
                return false;
            }
        }
        return true;
    }

    // Read one line of data from the file object in forward
    // The first char in backward must be a \n
    // The result string does not contain line endings
    protected function _readLineForward(\SplFileObject $fileObject)
    {
        if ($fileObject->eof()) {
            return '';
        }
        return $this->_readToEOLForward($fileObject);
    }

    // Read one line of data from the file object in backward
    // The first char in backward must be a \n
    // The result string does not contain line endings
    protected function _readLineBackward(\SplFileObject $fileObject)
    {
        // Whether the cursor reaches the beginning
        if ($fileObject->fseek(-1, SEEK_CUR) === -1) {
            return '';
        }
        $char = $fileObject->fread(1);
        if ($char === "\n") {
            // If last char is a \n, move one more char backward
            // otherwise the _readToEOLBackward() will stops before it
            if ($fileObject->fseek(-1, SEEK_CUR) === -1) {
                throw Exception('Failed to seek the file backward');
            }
        }
        return $this->_readToEOLBackward($fileObject);
    }

    // Read data from the file object in forward
    // The cursor will be stopped right after the \n or EOF
    protected function _readToEOLForward(\SplFileObject $fileObject)
    {
        $readChars = array();
        $offset = $fileObject->ftell();
        $fileSize = $fileObject->getSize();
        while ($offset < $fileSize) {
            $readSize = $this->_options->bufferSize;
            if ($offset + $this->_options->bufferSize > $fileSize) {
                $readSize = $fileSize - $offset;
            }
            $chunk = $fileObject->fread($readSize);
            $chars = str_split($chunk);
            $count = count($chars);
            for ($i = 0; $i < $count; $i++) {
                if ($chars[$i] === "\n") {
                    $fileObject->fseek($offset + $i + 1, SEEK_SET);
                    break 2;
                } else {
                    array_push($readChars, $chars[$i]);
                }
            }
            $offset = $fileObject->ftell();
        }
        return implode('', $readChars);
    }

    // Read data from the file object in backward
    // The cursor will be stopped right after the \n or BOF
    protected function _readToEOLBackward(\SplFileObject $fileObject)
    {
        $readChars = array();
        $offset = $fileObject->ftell();
        while ($fileObject->ftell() > 0) {
            $readSize = $this->_options->bufferSize;
            if ($offset < $this->_options->bufferSize) {
                $readSize = $offset;
            }
            if ($fileObject->fseek(0 - $readSize, SEEK_CUR) === -1) {
                break;  // seek failed
            }
            $chunk = $fileObject->fread($readSize);
            if ($fileObject->fseek($offset - $readSize, SEEK_SET) === -1) {
                break;  // seek failed
            }
            $chars = str_split($chunk);
            for ($i = count($chars) - 1; $i >= 0; $i--) {
                if ($chars[$i] === "\n") {
                    $fileObject->fseek($i + 1, SEEK_CUR);
                    break 2;
                } else {
                    array_unshift($readChars, $chars[$i]);
                }
            }
            $offset = $fileObject->ftell();
        }
        return implode('', $readChars);
    }
}
