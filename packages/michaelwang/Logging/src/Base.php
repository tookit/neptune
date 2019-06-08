<?php

namespace Michaelwang\Logging;

class Base
{
    /**
     * @var Options
     */
    protected $_options;

    /**
     * @var SplFileObject
     */
    protected $_lock;

    /**
     * Constructor
     * @param Options $options
     * @throws SystemException
     */
    public function __construct(Options $options)
    {
        $this->_options = $options;
    }

    /**
     * Return the active log file entry
     */
    protected function _getActiveLogEntry()
    {
        $meta = $this->_getMeta();
        if (!$meta->activeLog) {
            return false;
        }
        $logFilePath = $this->_options->dataDir . DIRECTORY_SEPARATOR . $meta->activeLog;
        if (!is_file($logFilePath)) {
            return false;
        }
        return $meta->activeLog;
    }

    /**
     * Return the log file entry containing the specific timestamp, 0 for the first entry
     */
    protected function _getLogEntry($timestamp = 0)
    {
        $entries = $this->_getAllLogEntries();
        if (count($entries) === 0) {
            return false;
        }
        $needle = $this->_options->getLogName($timestamp);
        $entries[] = $needle;
        sort($entries);
        $index = array_search($needle, $entries);  // It's impossible to lost the needle in the array
        if ($timestamp === 0) {
            return $entries[1];
        }
        if ($index < count($entries) - 1 && $entries[$index + 1] === $needle) {
            return $needle;
        }
        if ($index > 0) {
            return $entries[$index - 1];
        }
        // index === 0, no entries contain this timestamp
        return false;
    }

    /**
     * Return a list of all the log file entries
     */
    protected function _getAllLogEntries()
    {
        $entries = glob($this->_options->dataDir.DIRECTORY_SEPARATOR.'*.log');
        return   array_map(function($entry){
            return basename($entry);
        },$entries);
    }

    /**
     * Count total records in the specific log file
     */
    protected function _countRecords($logFile)
    {
        $total = 0;
        if (!is_file($logFile)) {
            return $total;
        }
        $logFileSFO = new \SplFileObject($logFile, 'r');
        $logFileSFO->rewind();
        while (!$logFileSFO->eof()) {
            $line = $logFileSFO->fgets();
            $total++;
        }
        $logFileSFO = null;  // release the resource
        return $total - 1;  // the last line should be empty
    }

    /**
     * Whether the lock is holding
     */
    protected function _isLocking()
    {
        return (bool) ($this->_lock);
    }

    /**
     * Lock for current namespace
     * will block and wait until the lock has been released
     */
    protected function _lock()
    {
        $lockFile = $this->_options->metaFile;
        $this->_lock = new \SplFileObject($lockFile, 'c+');
        $block = true;
        $this->_lock->flock(LOCK_EX, $block);
    }

    /**
     * Release the lock for current namespace
     */
    protected function _unlock()
    {
        $this->_lock->flock(LOCK_UN);
        $this->_lock = null;  // release the resource
    }

    /**
     * Return meta info of current namespace
     */
    protected function _getMeta()
    {
        $json = '';
        if ($this->_lock) {
            $this->_lock->rewind();
            $json = $this->_lock->current();
        } else {
            if (!is_file($this->_options->metaFile)) {
                // Initialize a new Meta instance
                return new Meta();
            }
            $json = file_get_contents($this->_options->metaFile);
        }
        $data = json_decode($json, true);
        $meta = new Meta($data);
        return $meta;
    }

    /**
     * Save meta info
     */
    protected function _saveMeta(Meta $meta)
    {
        $isLocking = $this->_isLocking();
        if (!$isLocking) {
            $this->_lock();
        }
        $data = $meta->getData();
        $json = json_encode($data);
        $this->_lock->ftruncate(0);
        $this->_lock->fseek(0);
        $this->_lock->fwrite($json);
        $this->_lock->fflush();
        if (!$isLocking) {  // if the lock is not being acquired in this function
            $this->_unlock();
        }
    }
}
