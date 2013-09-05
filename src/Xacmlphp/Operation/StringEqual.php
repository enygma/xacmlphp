<?php

namespace Xacmlphp\Operation;

class StringEqual extends \Xacmlphp\Operation
{
    public function evaluate()
    {
        $prop1 = $this->getProperty1();
        $prop2 = $this->getProperty2();

        return $prop1 == $prop2;
    }
}