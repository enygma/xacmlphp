<?php

namespace Xacmlphp;

/**
 * Attribute of an object (resource, subject, etc...)
 *
 * @package Xacmlphp
 */
class Attribute
{
    /**
     * Attribute name
     * @var string
     */
    private $name = null;

    /**
     * Attribute value
     * @var mixed
     */
    private $value = null;

    /**
     * Construct the object and set the name/value
     *
     * @param string $name Attribute name
     * @param mixed $value Attribute value
     */
    public function __construct($name, $value)
    {
        $this->setName($name)->setValue($value);
    }

    /**
     * Get the name for the attribute
     *
     * @return string Attribute name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the name for the attribute
     *
     * @param string $name Name for attribute
     * @return \Xacmlphp\Attribute instance
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get the attribute value
     *
     * @return mixed Attribute value
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set the attribute value
     *
     * @param mixed $value Attribute value
     * @return \Xacmlphp\Attribute instance
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }
}