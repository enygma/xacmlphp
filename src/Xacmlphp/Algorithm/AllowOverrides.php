<?php

namespace Xacmlphp\Algorithm;

/**
 * According to "Allow Overrides" if any policy in the set
 * passes, return PERMIT
 */
class AllowOverrides extends \Xacmlphp\Algorithm
{
    public function evaluate(array $results, \Xacmlphp\Policy $policy = null)
    {
        return in_array(true, $results);
    }
}
