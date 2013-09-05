<?php

namespace Oasisphp;

/**
 * The "Decider" for the pass/fail of:
 *     - policy sets
 *     - policies
 *     - rules
 *     - matches
 *
 * @package Oasisphp
 */
class Decider
{
    /**
     * Set of subject attributes
     * @var array
     */
    private $subjectAttributes = array();

    /**
     * Set the attrbiutes of the current subject
     *
     * @param array $attributes Attribute set
     * @return \Oasisphp\Decider instance
     */
    public function setSubjectAttributes($attributes)
    {
        $this->subjectAttributes = $attributes;
        return $this;
    }

    /**
     * Get the current subject's attributes
     *
     * @return array Attribute set
     */
    public function getSubjectAttributes()
    {
        return $this->subjectAttributes;
    }

    /**
     * Evaluate the given set of policies against the subject
     *
     * @param \Oasisphp\Subject $subject Current subject
     * @param \Oasisphp\PolicySet $policySet Set of policies
     * @return [type]            [description]
     */
    public function evaluate(\Oasisphp\Subject $subject, \Oasisphp\PolicySet $policySet)
    {
        // get the subject's attributes
        $this->setSubjectAttributes($subject->getAttributes());
        $policyResults = $this->handlePolicies($policySet->getPolicies());

        if (count($policyResults) == 1) {
            return array_shift($policyResults);

        } else {
            // we're working with a set of policies, go with the algorithm
            // if we have one...
            $algorithm = $policySet->getAlgorithm();
            if ($algorithm === null) {
                // defalt to most secure - deny overrides!
                $algorithm = new \Oasisphp\Algorithm\DenyOverrides();
                return $algorithm = $algorithm->evaluate($policyResults);
            }
        }
    }

    /**
     * Evaluate the policies for pass/fail status based on given algorithm
     *
     * @param array $policies Policies to evaluate
     * @return array Policy pass/fail results
     */
    public function handlePolicies(array $policies)
    {
        $results = array();

        foreach ($policies as $policy) {
            $rules = $policy->getRules();
            $policyResults = $this->handleRules($rules);

            $algorithm = $policy->getAlgorithm();
            $results[$policy->getId()] = $algorithm->evaluate($policyResults);
        }

        return $results;
    }

    /**
     * Handle the rules inside of policies for pass/fail status
     *
     * @param array $rules Set of rules to evaluate
     * @return array Results from rules evaluation
     */
    public function handleRules(array $rules)
    {
        $results = array();
        foreach ($rules as $rule) {
            $target = $rule->getTarget();
            $results = $this->handleMatches($target->getMatches());

            // check the results against our algorithm
            $algorithm = $rule->getAlgorithm();
            $results[$rule->getId()] = $algorithm->evaluate($results);
        }
        return $results;
    }

    /**
     * Handle the evaluation of matches (inside rules) for pass/fail status
     *
     * @param array $matches Set of matches to evaluate
     * @return array Set of match attribute check results
     */
    public function handleMatches(array $matches)
    {
        $results = array();
        $subjectAttributes = $this->getSubjectAttributes();

        foreach ($matches as $match) {
            $designator = $match->getDesignator();
            $value = $match->getValue();
            $operation = '\\Oasisphp\\Operation\\'.$match->getOperation();

            // see if the subject has the attribute
            foreach ($subjectAttributes as $sAttr) {
                $sDesignator = $sAttr->getName();
                $sValue = $sAttr->getValue();

                $op = new $operation($value, $sValue);
                $results[$match->getId()] = $op->evaluate();
            }
        }
        return $results;
    }
}