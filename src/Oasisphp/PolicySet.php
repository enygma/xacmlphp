<?php

namespace Oasisphp;

class PolicySet
{
    private $policies = array();

    private $algorithm = null;

    public function addPolicy(\Oasisphp\Policy $policy)
    {
        $this->policies[] = $policy;
        return $this;
    }

    public function getPolicies()
    {
        return $this->policies;
    }

    public function setAlgorithm(\Oasisphp\Algorithm $algorithm)
    {
        $this->algorithm = $algorithm;
        return $this;
    }

    public function getAlgorithm()
    {
        return $this->algorithm;
    }
}
