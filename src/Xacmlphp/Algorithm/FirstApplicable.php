<?php

namespace Xacmlphp\Algorithm;

/**
 * According to "First Applicable", evaluation happens in the order
 * the rules are in the policy, returning the result of the first item
 */
class FirstApplicable extends \Xacmlphp\Algorithm
{
    public function evaluate(array $results, \Xacmlphp\Policy $policy = null)
    {
        $rules = $policy->getRules();
        if (count($rules) > 0) {
            $firstRule = array_shift($rules);
            $firstRuleId = $firstRule->getId();
            return (array_key_exists($firstRuleId, $results))
                ? $results[$firstRuleId] : false;
        } else {
            return false;
        }
    }
}