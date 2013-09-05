<?php

namespace Xacmlphp\Algorithm;

/**
 * According to "Deny Overrides" if any policy in the set
 * fails, return DENY
 */
class AllowOverrides extends \Xacmlphp\Algorithm
{
    public function evaluate(array $results)
    {
        return in_array(true, $results);
    }
}