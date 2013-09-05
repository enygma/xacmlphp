<?php

namespace Xacmlphp\Algorithm;

/**
 * According to "Permit Unless Deny" if any policy in the set
 * fails, return DENY otherwise allow
 */
class PermitUnlessDeny extends \Xacmlphp\Algorithm
{
    public function evaluate(array $results, \Xacmlphp\Policy $policy = null)
    {
        $result = true;

        // see if we have a DENY
        if (in_array(false, $results) == true) {
            $result = false;
        }
        return $result;
    }
}