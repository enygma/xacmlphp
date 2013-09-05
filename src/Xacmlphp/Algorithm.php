<?php

namespace Xacmlphp;

/**
 * Abstract class to define a new algorithm
 *
 * @package Xacmlphp
 */
abstract class Algorithm
{
    /**
     * Evaluate the set of values for true/false status
     *
     * @param array $results Value set
     * @return boolean Pass/fail evaluation
     */
    abstract public function evaluate(array $results);
}