<?php

namespace Michaelwang\Logging;

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
