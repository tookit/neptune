<?php

namespace Michaelwang\Logging;


class SearchOptions extends Accessor
{
    /**
     * @var int The timestamp start searching from
     */
    protected $_from = 0;

    /**
     * @var int The timestamp stop searching to
     */
    protected $_to = 0;

    /**
     * @var int Whether to read in backward
     */
    protected $_reverse = 0;

    /**
     * @var array An array of field => keyword for filtering the results
     */
    protected $_conditions = array();

    /**
     * @var int The offset from the reference point
     */
    protected $_offset = 0;

    /**
     * @var int The amount of the records to read
     */
    protected $_count = 1;

}
