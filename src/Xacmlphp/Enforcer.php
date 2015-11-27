<?php

namespace Xacmlphp;

/**
 * Enforces the checking of the policies at the request point
 *
 * @package Xacmlphp
 */
class Enforcer
{
    /**
     * Current decider object
     *
     * @var Decider
     */
    private $decider = null;

    /**
     * Construct the object and set the decider if it's given
     *
     * @param Decider $decider Object
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
     * @param Decider $decider Decider object
     *
     * @return \Xacmlphp\Enforcer
     */
    public function setDecider(Decider $decider)
    {
        $this->decider = $decider;
        return $this;
    }

    /**
     * Get the current Decider object
     *
     * @return Decider object
     */
    public function getDecider()
    {
        return $this->decider;
    }

    /**
     * Check to see if the given Subject is authorized for the given Resource
     *
     * @param Subject $subject Subject making request
     * @param \Xacmlphp\Resource $resource Resource being accessed (policies attached)
     * @param Action $action Action instance
     *
     * @return bool Allowed/not allowed status
     */
    public function isAuthorized(Subject $subject, Resource $resource, Action $action)
    {
        $decider = $this->getDecider();
        if ($decider === null) {
            throw new \InvalidArgumentException('Invalid Decider object');
        }

        $policies = $resource->getPolicies();

        return $decider->evaluate($subject, $policies, $action);
    }
}