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
     * @var array
     */
    private $policies = array();

    /**
     * Combining algorithm
     * @var \Xacmlphp\Algorithm
     */
    private $algorithm = null;

    /**
     * Add a new policy to the set
     *
     * @param \Xacmlphp\Policy $policy Policy object
     * @return \Xacmlphp\PolicySet
     */
    public function addPolicy(\Xacmlphp\Policy $policy)
    {
        $this->policies[] = $policy;
        return $this;
    }

    /**
     * Get all current policies
     *
     * @return array Set of policies
     */
    public function getPolicies()
    {
        return $this->policies;
    }

    /**
     * Set the PolicySet combining algorithm
     *
     * @param \Xacmlphp\Algorithm $algorithm Combining algorithm
     * @return \Xacmlphp\PolicySet
     */
    public function setAlgorithm(\Xacmlphp\Algorithm $algorithm)
    {
        $this->algorithm = $algorithm;
        return $this;
    }

    /**
     * Get the current combining Algorithm
     *
     * @return \Xacmlphp\Algorithm instance
     */
    public function getAlgorithm()
    {
        return $this->algorithm;
    }
}
