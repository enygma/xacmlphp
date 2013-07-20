<?php

namespace Oasisphp\Operation;

class StringEqual extends \Oasisphp\Operation
{
    public function evaluate()
    {
        $prop1 = $this->getProperty1();
        $prop2 = $this->getProperty2();

        return $prop1 == $prop2;
    }
}