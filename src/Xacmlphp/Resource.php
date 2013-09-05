<?php

namespace Xacmlphp;

class Resource
{
    /**
     * Resource target path
     * @var string
     */
    private $target = null;

    /**
     * Set of policies applying to the Resource
     * @var array
     */
    private $policySet = null;

    /**
     * Set the current Resource target
     *
     * @param string $target Resource target
     * @return \Xacmlphp\Resource instance
     */
    public function setTarget($target)
    {
        $this->target = $target;
        return $this;
    }

    /**
     * Get the current Target value
     *
     * @return string Target value
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * Add a new policy to the Resource
     *
     * @param \Xacmlphp\Policy $policy Policy instance
     * @return \Xacmlphp\Resource instance
     */
    public function addPolicy(\Xacmlphp\Policy $policy)
    {
        if ($this->policySet === null) {
            $this->policySet = new \Xacmlphp\PolicySet();
        }
        $this->policySet->addPolicy($policy);
        return $this;
    }

    /**
     * Get the current set of policies
     *
     * @return array Policy set
     */
    public function getPolicies()
    {
        return $this->policySet;
    }

    /**
     * Add a full PolicySet to Resource (overwrites currently set Policies)
     *
     * @param \Xacmlphp\PolicySet $policySet Set of Policies
     */
    public function addPolicySet(\Xacmlphp\PolicySet $policySet)
    {
        $this->policySet = $policySet;
        return $this;
    }
}