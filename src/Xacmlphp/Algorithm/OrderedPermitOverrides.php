<?php

namespace Xacmlphp\Algorithm;

/**
 * According to "First Applicable", evaluation happens in the order
 * the rules are in the policy, returning the result of the first item
 */
class OrderedPermitOverrides extends \Xacmlphp\Algorithm
{
    public function evaluate(array $results, \Xacmlphp\Policy $policy = null)
    {
        $rules = $policy->getRules();
        if (count($rules) > 0) {
            foreach ($rules as $rule) {
                $firstRuleId = $rule->getId();
                if (array_key_exists($firstRuleId, $results) && $results[$firstRuleId] == true) {
                    return true;
                }
            }
            return false;
        } else {
            return false;
        }
    }
}