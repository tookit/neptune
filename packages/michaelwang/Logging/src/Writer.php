<?php
namespace Michaelwang\Logging;


class Writer extends Base
{


    /**
     * Constructor
     * @param Options $options
     */
    public function __construct(Options $options)
    {
        parent::__construct($options);

    }






    /**
     * Write a log record
     * The first element of the record item must be an integer of timestamp
     * This function will rotate the logs automatically
     * @param array $data Record data in an array
     * @param int $timestamp The created timestamp of this log
     * @return array The profiling info of this function
     */
    public function putRecord(array $data, $timestamp = 0)
    {
        $startTime = microtime(true);
        $this->_lock();  // blocks
        $record = new Record($data, $timestamp);
        $line = $record->serialize();
        $meta = $this->_getMeta();
        //
        if(!$meta->activeLog){
            $meta->activeLog = $this->_options->getLogName($timestamp);
            $activeLogFile = $this->_options->dataDir . DIRECTORY_SEPARATOR . $meta->activeLog;
            new \SplFileObject($activeLogFile, 'a+');
        }else{
            $activeLogFile = $this->_options->dataDir . DIRECTORY_SEPARATOR . $meta->activeLog;
        }
        $newLogFile = $this->createNewLogFileByStrategy($this->_options->getFileCTime($activeLogFile),$this->_options->logStrategy);
        $logSFO = new \SplFileObject($this->_options->dataDir . DIRECTORY_SEPARATOR . $newLogFile, 'a+');
        $meta->activeLog = $newLogFile;

        $fileSize = $logSFO->getSize();
        //PRESERVED: $fileSize will be used as the offset of this record for indexing
        $logSFO->fseek($fileSize);
        $logSFO->fwrite($line);
        $logSFO->fflush();
        $logSFO = null;  // release the resource
        $meta->totalCount++;
        $this->_saveMeta($meta);
        $this->_unlock();
        //
        $endTime = microtime(true);
        $timeSpent = $endTime - $startTime;
        return array(
            'time_spent' => $timeSpent
        );
    }


    public function createNewLogFileByStrategy($ctime = 0,$strategy = 'daily')
    {

        $currentTime  = time();
        $diffDays = (int) round(($currentTime - $ctime)/(60 * 60 * 24),0);
        switch ($strategy){

            case 'weekly':
                $timestamp = $diffDays >= 7 ? $currentTime : $ctime;
                return     $this->_options->getLogName($timestamp);

            case 'recordNumber':
                $threshold = $this->_options->rotationThreshold;
                $logFile = $this->_options->dataDir . DIRECTORY_SEPARATOR . $this->_getMeta()->activeLog;
                $activeTotal = $this->_countRecords($logFile);
                $timestamp = ($activeTotal >= $threshold) ? $currentTime : $ctime;
                return    $this->_options->getLogName($timestamp);

            default:
                //daily
                $timestamp = $diffDays >= 1 ? $currentTime : $ctime;
                return    $this->_options->getLogName($timestamp);

        }

    }




}
