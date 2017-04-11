<?php

namespace Xacmlphp\Algorithm;

/**
 * According to "Ordered Permit Overrides", evaluation happens 
 * in the order the rules are in the policy and if any policy in the set
 * passes, return PERMIT
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
