<?php

namespace Xacmlphp;

/**
 * Set of Policies, complete with it's own combining algorithm
 *
 * @package Xacmlphp
 */
class PolicySet
{
    /**
     * Set of Policies
     *
     * @var Policy[]
     */
    private $policies = array();

    /**
     * Combining algorithm
     *
     * @var Algorithm
     */
    private $algorithm = null;

    /**
     * Add a new policy to the set
     *
     * @param Policy $policy Policy object
     *
     * @return \Xacmlphp\PolicySet
     */
    public function addPolicy(Policy $policy)
    {
        $this->policies[] = $policy;
        return $this;
    }

    /**
     * Get all current policies
     *
     * @return Policy[] Set of policies
     */
    public function getPolicies()
    {
        return $this->policies;
    }

    /**
     * Set the PolicySet combining algorithm
     *
     * @param Algorithm $algorithm Combining algorithm
     *
     * @return \Xacmlphp\PolicySet
     */
    public function setAlgorithm(Algorithm $algorithm)
    {
        $this->algorithm = $algorithm;
        return $this;
    }

    /**
     * Get the current combining Algorithm
     *
     * @return Algorithm instance
     */
    public function getAlgorithm()
    {
        return $this->algorithm;
    }
}
