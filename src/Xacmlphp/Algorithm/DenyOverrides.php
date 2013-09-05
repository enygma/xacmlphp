<?php

namespace Xacmlphp\Algorithm;

/**
 * According to "Deny Overrides" if any policy in the set
 * fails, return DENY
 */
class DenyOverrides extends \Xacmlphp\Algorithm
{
    public function evaluate(array $results, \Xacmlphp\Policy $policy = null)
    {
        return (!in_array(false, $results));
    }
}