<?php
namespace Michaelwang\Logging;


class Record
{
    /**
     * @var array
     */
    protected $_data = array();

    /**
     * Construct record instance from raw data
     * without throwing exceptions
     */
    public static function from($raw)
    {
        try {
            return new Record($raw);
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Constructor
     * @param array|string $data
     * @throws Exception
     */
    public function __construct($data,$timestamp = 0)
    {
        if (is_string($data)) {
            $this->unserialize($data);
        } elseif (is_array($data)) {
            if (!isset($data['timestamp'])) {
                if ($timestamp === 0) {
                    $timestamp = time();
                }
                $data['timestamp'] = $timestamp;
            }
            $this->_data = $data;
        }
    }

    /**
     * Option getter
     * @param string $name
     * @return mixed
     */
    public function __get($name)
    {
        $method = '_get' . ucfirst($name);
        if (method_exists($this, $method)) {
            return $this->$method();
        }
        if (isset($this->_data[$name])) {
            return $this->_data[$name];
        }
        return null;
    }

    /**
     * Return the record data
     */
    public function getData()
    {
        return $this->_data;
    }

    /**
     * Test whether the record matches the conditions as field => keyword
     * @param array $conditions
     * @return bool
     */
    public function matches($conditions)
    {
        $result = true;
        foreach ($conditions as $field => $keyword) {
            if (!$result) {
                return false;
            }
            if (!isset($this->_data[$field])) {
                return false;
            }
            $value = $this->_data[$field];
            if (!is_string($value)) {
                $value = json_encode($value);
            }
            $result &= (stripos($value, $keyword) !== false);
        }
        return $result;
    }

    /**
     * Encode this record into a string of record
     */
    public function serialize()
    {
        $data = array(
            $this->timestamp,
            $this->_data
        );
        unset($data[1]['timestamp']);
        return json_encode($data) . ",\n";
    }

    /**
     * Decode the string of record into an array
     */
    public function unserialize($raw)
    {
        $data = json_decode(trim($raw, ", \t\n\r\0\x0B"), true);
        if (!$data) {
            throw new \Exception("Invalid logging record data: ${raw}");
        }
        $record = $data[1];
        $record = array_merge(array(
            'timestamp' => $data[0]
        ), $data[1] );
        $this->_data = $record;
        return $this;
    }
}
