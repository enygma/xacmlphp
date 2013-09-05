<?php

namespace Xacmlphp\Algorithm;

/**
 * According to "Deny Unless Permit" if any policy in the set
 * passes, return PERMIT
 */
class DenyUnlessPermit extends \Xacmlphp\Algorithm
{
    public function evaluate(array $results, \Xacmlphp\Policy $policy = null)
    {
        return in_array(true, $results);
    }
}