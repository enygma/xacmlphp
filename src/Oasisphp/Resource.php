<?php

namespace Oasisphp;

class Resource
{
    private $target = null;

    private $policySet = null;

    public function setTarget($target)
    {
        $this->target = $target;
    }
    public function getTarget()
    {
        return $this->target;
    }

    public function addPolicy(\Oasisphp\Policy $policy)
    {
        if ($this->policySet === null) {
            $this->policySet = new \Oasisphp\PolicySet();
        }
        $this->policySet->addPolicy($policy);
        return $this;
    }
    public function getPolicies()
    {
        return $this->policySet;
    }
    public function addPolicySet(\Oasisphp\PolicySet $policySet)
    {
        $this->policySet = $policySet;
        return $this;
    }
}