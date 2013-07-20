<?php

namespace Oasisphp;

abstract class Operation
{
    protected $property1 = null;

    protected $property2 = null;

    public function __construct($property1, $property2)
    {
        $this->setProperty1($property1);
        $this->setProperty2($property2);
    }

    public function setProperty1($value)
    {
        $this->property1 = $value;
    }
    public function getProperty1()
    {
        return $this->property1;
    }

    public function setProperty2($value)
    {
        $this->property2 = $value;
        return $this;
    }
    public function getProperty2()
    {
        return $this->property2;
    }

    abstract public function evaluate();
}