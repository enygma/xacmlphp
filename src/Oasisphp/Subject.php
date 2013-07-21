<?php

namespace Oasisphp;

/**
 * Subject of current evaluation
 *
 * @package Oasisphp
 */
class Subject
{
    /**
     * Attribute set for subject
     * @var array
     */
    private $attributes = array();

    /**
     * Add a new Attribute
     *
     * @param \Oasisphp\Attribute $attribute instance
     * @return \Oasisphp\Subject instance
     */
    public function addAttribute(\Oasisphp\Attribute $attribute)
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
}