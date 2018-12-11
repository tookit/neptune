<?php

namespace Michaelwang\Logging;

/**
 * Meta Class
 *
 * For manipulating meta info of logging
 *
 * @package    Logging
 * @category   Meta
 * @version    1.0
 */
class Meta extends Accessor
{
    /**
     * @var string Active log file for writing
     */
    protected $_activeLog = '';

    /**
     * @var int Total count of the records
     */
    protected $_totalCount = 0;

    /**
     * Constructor
     */
    public function __construct($data = null)
    {
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $this->$key = $value;
            }
        }
    }

    /**
     * Return an array containing all the meta info
     */
    public function getData()
    {
        return array(
            'activeLog' => $this->activeLog,
            'totalCount' => $this->totalCount
        );
    }
}
