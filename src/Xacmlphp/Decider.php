<?php

namespace Xacmlphp;

/**
 * The "Decider" for the pass/fail of:
 *     - policy sets
 *     - policies
 *     - rules
 *     - matches
 *
 * @package Xacmlphp
 */
class Decider
{
    /**
     * Set of subject attributes
     *
     * @var array
     */
    private $subjectAttributes = array();

    /**
     * Set the attributes of the current subject
     *
     * @param array $attributes Attribute set
     *
     * @return \Xacmlphp\Decider instance
     */
    public function setSubjectAttributes($attributes)
    {
        $this->subjectAttributes = $attributes;
        return $this;
    }

    /**
     * Get the current subject's attributes
     *
     * @return Attribute[] set of attributes
     */
    public function getSubjectAttributes()
    {
        return $this->subjectAttributes;
    }

    /**
     * Evaluate the given set of policies against the subject
     *
     * @param Subject $subject Current subject
     * @param PolicySet $policySet Set of policies
     * @param Action $action
     *
     * @return bool
     */
    public function evaluate(Subject $subject, PolicySet $policySet, Action $action)
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
                // default to most secure - deny overrides!
                $algorithm = new Algorithm\DenyOverrides();
            }
            return $algorithm = $algorithm->evaluate($policyResults);
        }
    }

    /**
     * Evaluate the policies for pass/fail status based on given algorithm
     *
     * @param \Xacmlphp\Policy[] $policies to evaluate
     *
     * @return array Policy pass/fail results
     */
    public function handlePolicies(array $policies)
    {
        $results = array();

        foreach ($policies as $policy) {
            $rules = $policy->getRules();
            $policyResults = $this->handleRules($rules);

            $algorithm = $policy->getAlgorithm();
            $results[$policy->getId()] = $algorithm->evaluate($policyResults, $policy);
        }

        return $results;
    }

    /**
     * Handle the rules inside of policies for pass/fail status
     *
     * @param \Xacmlphp\Rule[] $rules Set of rules to evaluate
     *
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
     * @param \Xacmlphp\Match[] $matches Set of matches to evaluate
     *
     * @return array Set of match attribute check results
     */
    public function handleMatches(array $matches)
    {
        $results = array();
        $subjectAttributes = $this->getSubjectAttributes();

        foreach ($matches as $match) {
            $designator = $match->getDesignator();
            $value = $match->getValue();
            $operation = '\\Xacmlphp\\Operation\\' . $match->getOperation();

            // see if the subject has the attribute
            foreach ($subjectAttributes as $sAttr) {
                $sDesignator = $sAttr->getName();
                if ($designator == $sDesignator) {
                    $sValue = $sAttr->getValue();
                    /** @var \Xacmlphp\Operation $op */
                    $op = new $operation($value, $sValue);
                    $results[$match->getId()] = $op->evaluate();
                }
            }

        }
        return $results;
    }
}