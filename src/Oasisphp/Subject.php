<?php

namespace Oasisphp;

class Subject
{
    private $attributes = array();

    public function addAttribute(\Oasisphp\Attribute $attribute)
    {
        $this->attributes[] = $attribute;
    }
    public function getAttributes()
    {
        return $this->attributes;
    }
}