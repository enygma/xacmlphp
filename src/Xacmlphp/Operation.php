<?php

namespace Xacmlphp;

/**
 * Matching operation definition
 *
 * @package Xacmlphp
 */
abstract class Operation
{
    /**
     * Property #1 to evaluate
     * @var mixed
     */
    protected $property1 = null;

    /**
     * Property #2 to evaluate
     * @var mixed
     */
    protected $property2 = null;

    /**
     * Construct the operation with the two values
     *
     * @param mixed $property1 Property value #1
     * @param mixed $property2 Property value #2
     */
    public function __construct($property1, $property2)
    {
        $this->setProperty1($property1);
        $this->setProperty2($property2);
    }

    /**
     * Set the first property to evaluate
     *
     * @param mixed $value Property value
     *
     * @return $this
     */
    public function setProperty1($value)
    {
        $this->property1 = $value;
        return $this;
    }

    /**
     * Get the first property value
     *
     * @return mixed Property #1 value
     */
    public function getProperty1()
    {
        return $this->property1;
    }

    /**
     * Set the second property value
     *
     * @param mixed $value Property #2 value
     * @return \Xacmlphp\Operation instance
     */
    public function setProperty2($value)
    {
        $this->property2 = $value;
        return $this;
    }

    /**
     * Get the second property value
     *
     * @return mixed Property #2 value
     */
    public function getProperty2()
    {
        return $this->property2;
    }

    /**
     * Evaluate the properties against acceptance criteria
     *
     * @return boolean Pass/fail of evaluation status
     */
    abstract public function evaluate();
}