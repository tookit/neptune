<?php
namespace Michaelwang\Logging;


use Psr\Log\InvalidArgumentException;


class Options extends Accessor
{



    /**
     * @var string The base dir of the logging files
     */
    protected $_baseDir = __DIR__;


    protected $_logStrategy = 'daily';

    protected $_logExt = '.log';

    /**
     * @var
     */
    protected $_logNamePattern = '%s';

    /**
     * @var \Closure
     */
    protected $_logNameFormatter;

    protected $_availableStrategy = [

        'daily',
        'weekly',
        'recordNumber'

    ];

    /**
     * @var string The namespace of this logging instance
     */
    protected $_namespace = '';

    /**
     * @var int The buffer size in bytes for reading records
     */
    protected $_bufferSize = 16;

    /**
     * @var int The logs will be rotated when records exceeds this threshold, 0 for no rotation at all
     */
    protected $_rotationThreshold = 1024;

    /**
     * @var int The file name of the meta file
     */
    protected $_metaFileName = 'meta.json';

    /**
     * @var int The file name of the index file (this is actually used as an index folder)
     */
    protected $_indexFileName = 'indexes';



    /*
        Other options return by methods:
            dataDir
            metaFile
    */


    public function __construct(array $options)
    {
        parent::__construct($options);

        $this->_logStrategy = env('LOG_ROTATION','daily');
        if(!in_array($this->_logStrategy,$this->_availableStrategy)){

            throw new InvalidArgumentException(sprintf('Invalid log strategy: %s',$this->_logStrategy));
        }
    }

    /**
     * Option 'dataDir' getter
     * @return string
     */
    protected function _getDataDir()
    {
        $dataDir = $this->_baseDir . DIRECTORY_SEPARATOR . $this->_namespace;
        $this->_checkDir($dataDir);
        return $dataDir;
    }

    /**
     * Option 'metaFile' getter
     * @return string
     */
    protected function _getMetaFile()
    {
        return $this->dataDir . DIRECTORY_SEPARATOR . $this->_metaFileName;
    }

    /**
     * Option 'indexFile' getter
     * @return string
     */
    protected function _getIndexFile()
    {
        return $this->dataDir . DIRECTORY_SEPARATOR . $this->_indexFileName;
    }

    /**
     * Option 'indexName' getter
     * @return string
     */
    protected function _getIndexName()
    {
        return 'index_' . (strlen($this->namespace) > 0 ? $this->namespace : '0');
    }

    /**
     * Option 'baseDir' setter
     * @param string $value
     */
    protected function _setBaseDir($value)
    {
        $this->_checkDir($value);
        $this->_baseDir = realpath($value);
    }

    /**
     * Option 'namespace' setter
     * @param string $value
     */
    protected function _setNamespace($value)
    {
        $this->_namespace = str_replace( DIRECTORY_SEPARATOR, '', strtolower($value));
    }

    /**
     * Check if the dir of logging destination is exists and be a folder
     * if not, create it or throws
     */
    protected function _checkDir($dir)
    {
        if (!realpath($dir)) {
            @mkdir($dir, 0777, true);
        }
        if (!is_dir($dir)) {
            throw new Exception('The path of ' . $dir . ' is not a valid folder');
        }
    }

    public function getLogName($timestamp = 0 , \Closure  $closure = null) {

        return sprintf($this->_logNamePattern.$this->_logExt,call_user_func( $closure == null ? [$this,'fileNameFormatter'] : $closure   ,$timestamp));
    }


    public function getFileCTime($file){

        $fileName = basename($file,$this->_logExt);
        list($date) = sscanf($fileName, $this->_logNamePattern);
        return strtotime($date);
    }

    protected function fileNameFormatter($timestamp)
    {
        return date('Ymd',$timestamp);
    }
}
