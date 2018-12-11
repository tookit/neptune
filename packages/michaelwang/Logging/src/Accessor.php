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
 * Accessor Class
 *
 * The abstract class for access customized data
 *
 * @package    Logging
 * @category   Accessor
 * @copyright  Copyright (c) 2016 Enigma Software (http://www.enigmasoftware.com)
 * @version    1.0
 * @link       http://enigmasoftware.com
 */
abstract class Accessor
{
    /**
     * Constructor
     */
    public function __construct(array $options)
    {
        foreach ($options as $name => $value) {
            $this->$name = $value;
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
        $property = '_' . $name;
        if (property_exists($this, $property)) {
            return $this->$property;
        }
        return null;
    }

    /**
     * Option setter
     * @param string $name
     * @param mixed $value
     * @param Option
     * @return $this
     */
    public function __set($name, $value)
    {
        $method = '_set' . ucfirst($name);
        if (method_exists($this, $method)) {
            $this->$method($value);
        }
        $property = '_' . $name;
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
        return $this;
    }
}
