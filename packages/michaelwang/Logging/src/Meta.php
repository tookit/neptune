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
 * Meta Class
 *
 * For manipulating meta info of logging
 *
 * @package    Logging
 * @category   Meta
 * @copyright  Copyright (c) 2016 Enigma Software (http://www.enigmasoftware.com)
 * @version    1.0
 * @link       http://enigmasoftware.com
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
