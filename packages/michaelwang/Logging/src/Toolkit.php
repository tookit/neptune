<?php

namespace Michaelwang\Logging;

class Toolkit extends Base
{
    public function prepare()
    {
        @mkdir($this->_options->dataDir, 0777, true);
    }

    public function rebuild_meta()
    {
        $entries = $this->_getAllLogEntries();
        $totalCount = 0;
        foreach ($entries as $entry) {
            $file = $this->_options->dataDir . DIRECTORY_SEPARATOR . $entry;
            $totalCount += $this->_countRecords($file);
        }
        $count = count($entries);
        if ($count > 0) {
            $activeLog = $entries[$count - 1];
            $meta = new Meta(array(
                'activeLog' => $activeLog,
                'totalCount' => $totalCount
            ));
            $this->_saveMeta($meta);
        }
    }

    public function rebuild_index()
    {
        $tnt = new TNTSearch();
        @mkdir($this->_options->indexFile, 0777, true);
        @array_map('unlink', glob($this->_options->indexFile . DIRECTORY_SEPARATOR . '{,.}*', GLOB_BRACE));
        $tnt->loadConfig(array(
            'storage' => $this->_options->indexFile,
            'driver' => 'filesystem',
            'location' => '/dev/null'  // dummy location to prevent the indexer to run because we need to add the index entries on our own
        ));
        $indexer = $tnt->createIndex($this->_options->indexName);
        $indexer->setPrimaryKey('_key');
        $entries = $this->_getAllLogEntries();
        foreach ($entries as $entry) {
            $file = $this->_options->dataDir . DIRECTORY_SEPARATOR . $entry;
            $logSFO = new \SplFileObject($file, 'r');
            while (!$logSFO->eof()) {
                $line = $logSFO->fgets();
                $record = Record::from($line);
                if (!$record) {
                    continue;
                }
                $offset = $logSFO->ftell();
                $length = strlen($line);
                $id = "${entry}:${offset}:${length}";
                echo "Adding index #${id} for ${line}";
                $indexer->insert(array_merge($record->getData(), array(
                    '_key' => $id
                )));
            }
            $logSFO = null;  // release the resource
        }
    }

    public function realign_logs()
    {
        $options = $this->_options;
        $tmpDir = $file = $options->dataDir . DIRECTORY_SEPARATOR . 'tmp';
        @mkdir($tmpDir, 0777, true);
        @array_map('unlink', glob($tmpDir . DIRECTORY_SEPARATOR . '{,.}*', GLOB_BRACE));
        $entries = $this->_getAllLogEntries();
        $newLogSFO = null;
        $openFunc = function ($timestamp) use (&$newLogSFO, $tmpDir) {
            $newLogFile = $tmpDir . DIRECTORY_SEPARATOR . "${timestamp}.log";
            $newLogSFO = new \SplFileObject($newLogFile, 'w');
        };
        $closeFunc = function () use (&$newLogSFO) {
            $newLogSFO->fflush();
            $newLogSFO = null;  // release the resource
        };
        $count = 0;
        $processFunc = function ($logSFO) use (&$newLogSFO, &$count, $options, $openFunc, $closeFunc) {
            while (!$logSFO->eof()) {
                $line = $logSFO->fgets();
                $record = Record::from($line);
                if (!$record) {
                    continue;
                }
                if ($record->timestamp === 0) {
                    continue;
                }
                if (!$newLogSFO) {
                    $openFunc($record->timestamp);
                }
                $newLogSFO->fwrite($line);
                if (++$count >= $options->rotationThreshold) {
                    $closeFunc();
                    $count = 0;
                }
            }
        };
        foreach ($entries as $entry) {
            $file = $options->dataDir . DIRECTORY_SEPARATOR . $entry;
            $logSFO = new \SplFileObject($file, 'r');
            $processFunc($logSFO);
            $logSFO = null;  // release the resource
        }
        @array_map('unlink', glob($options->dataDir . DIRECTORY_SEPARATOR . '*.log', GLOB_BRACE));
        if ($handle = opendir($tmpDir)) {
            while (false !== ($entry = readdir($handle))) {
                if (strlen($entry) === 14) {  // weak compare: length of timestamp + '.log'
                    rename($tmpDir . DIRECTORY_SEPARATOR . $entry, $options->dataDir . DIRECTORY_SEPARATOR . $entry);
                }
            }
            closedir($handle);
        }
        @array_map('unlink', glob($tmpDir . DIRECTORY_SEPARATOR . '{,.}*', GLOB_BRACE));
        @rmdir($tmpDir);
    }
}
