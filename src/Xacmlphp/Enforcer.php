<?php

namespace Xacmlphp;

/**
 * Enforces the checking of the policies at the request point
 *
 * @package Oasisphp
 */
class Enforcer
{
    /**
     * Current decider object
     * @var \Oasisphp\Decider
     */
    private $decider = null;

    /**
     * Construct the object and set the decider if it's given
     *
     * @param \Oasisphp\Decider $decider Object
     */
    public function __construct($decider = null)
    {
        if ($decider !== null) {
            $this->setDecider($decider);
        }
    }

    /**
     * Set the Decider object
     *
     * @param \Oasisphp\Decider $decider Decider object
     * @return \Oasisphp\Enforcer
     */
    public function setDecider(\Oasisphp\Decider $decider)
    {
        $this->decider = $decider;
        return $this;
    }

    /**
     * Get the current Decider object
     *
     * @return \Oasisphp\Decider object
     */
    public function getDecider()
    {
        return $this->decider;
    }

    /**
     * Check to see if the given Subject is authorized for the given Resource
     *
     * @param \Oasisphp\Subject $subject Subject making request
     * @param \Oasisphp\Resource $resource Resource being accessed (policies attached)
     * @param \Oasisphp\Action $action Action instance
     * @return boolean Allowed/not allowed status
     */
    public function isAuthorized(\Oasisphp\Subject $subject, \Oasisphp\Resource $resource, \Oasisphp\Action $action)
    {
        $decider = $this->getDecider();
        if ($decider === null) {
            throw new \InvalidArgumentException('Invalid Decider object');
        }

        $policies = $resource->getPolicies();

        return $decider->evaluate($subject, $policies);
    }
}