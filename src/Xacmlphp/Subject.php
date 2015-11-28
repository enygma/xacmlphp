<?php

namespace Xacmlphp;

/**
 * Subject of current evaluation
 *
 * @package Xacmlphp
 */
class Subject
{
    /**
     * Attribute set for subject
     *
     * @var array
     */
    private $attributes = array();

    /**
     * Add a new Attribute
     *
     * @param Attribute $attribute instance
     *
     * @return \Xacmlphp\Subject instance
     */
    public function addAttribute(Attribute $attribute)
    {
        $this->attributes[] = $attribute;
        return $this;
    }

    /**
     * Get the current set of Attributes
     *
     * @return array Attribute set
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Empty current attribute list
     */
    public function clearAttributes()
    {
        $this->attributes = array();
    }
}