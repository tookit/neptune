<?php
/**
 * Enigma Software Group CONFIDENTIAL
 * _______________________________________________________________________
 * [2003] - [2016] Enigma Software Group
 * All Rights Reserved.
 * NOTICE: All information contained herein is, and remains
 * the property of Enigma Software Group and its suppliers,
 * if any. The intellectual and technical concepts contained
 * herein are proprietary to Enigma Software Group
 * and its suppliers and may be covered by U.S. and Foreign Patents,
 * patents in process, and are protected by trade secret or copyright law.
 * Dissemination of this information or reproduction of this material
 * is strictly forbidden unless prior written permission is obtained
 * from Enigma Software Group.
 */

namespace Michaelwang\Logging;

/**
 * SearchOptions Class
 *
 * The options for reading records
 *
 * @package    Logging
 * @category   SearchOptions
 * @copyright  Copyright (c) 2016 Enigma Software (http://www.enigmasoftware.com)
 * @version    1.0
 * @link       http://enigmasoftware.com
 */
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
