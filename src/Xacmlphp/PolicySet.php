<?php

namespace Oasisphp;

/**
 * Set of Policies, complete with it's own combining algorithm
 *
 * @package Oasisphp
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
     * @var \Oasisphp\Algorithm
     */
    private $algorithm = null;

    /**
     * Add a new policy to the set
     *
     * @param \Oasisphp\Policy $policy Policy object
     * @return \Oasisphp\PolicySet
     */
    public function addPolicy(\Oasisphp\Policy $policy)
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
     * @param \Oasisphp\Algorithm $algorithm Combining algorithm
     * @return \Oasisphp\PolicySet
     */
    public function setAlgorithm(\Oasisphp\Algorithm $algorithm)
    {
        $this->algorithm = $algorithm;
        return $this;
    }

    /**
     * Get the current combining Algorithm
     *
     * @return \Oasisphp\Algorithm instance
     */
    public function getAlgorithm()
    {
        return $this->algorithm;
    }
}
