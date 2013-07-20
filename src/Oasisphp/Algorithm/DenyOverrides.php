<?php

namespace Oasisphp\Algorithm;

/**
 * According to "Deny Overrides" if any policy in the set
 * fails, return DENY
 */
class DenyOverrides extends \Oasisphp\Algorithm
{
    public function evaluate(array $results)
    {
        return (!in_array(false, $results));
    }
}