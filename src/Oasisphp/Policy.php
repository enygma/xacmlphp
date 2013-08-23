<?php

namespace Oasisphp;

/**
 * Policy definition
 *
 * @package Oasisphp
 */
class Policy
{
    /**
     * Set of policy rules
     * @var array
     */
    private $rules = array();

    /**
     * Policy target
     * @var Resource/action/environment it applies to
     */
    private $target = null;

    /**
     * Combining algorithm
     * @var \Oasisphp\Algorithm
     */
    private $algorithm = null;

    /**
     * Version of the policy
     * @var string
     */
    private $version = '1.0';

    /**
     * Obligations to perform after match
     * @var array
     */
    private $obligations = array();

    /**
     * Conditional advice to follow after match
     * @var array
     */
    private $advice = array();

    /**
     * Description of the policy
     * @var string
     */
    private $description = '';

    /**
     * Policy ID (Ex. "Policy1")
     * @var string
     */
    private $id = null;

    /**
     * Action instance
     * @var \Oasisphp\Action
     */
    private $action = null;

    /**
     * Add a new Rule to the Policy
     *
     * @param \Oasisphp\Rule $rule Policy rule object
     * @return \Oasisphp\Policy instance
     */
    public function addRule(\Oasisphp\Rule $rule)
    {
        $this->rules[] = $rule;
        return $this;
    }

    /**
     * Get the current rule set
     *
     * @return array Rule set
     */
    public function getRules()
    {
        return $this->rules;
    }

    /**
     * Set the policy target
     *
     * @param string $target Target path of related
     *   resource/action/environment
     * @return \Oasisphp\Policy instance
     */
    public function setTarget($target)
    {
        $this->target = $target;
        return $this;
    }

    /**
     * Get the current Policy target
     *
     * @return string Target path
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * Set the Policy description
     *
     * @param string $description
     * @return \Oasisphp\Policy instance
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get teh current description
     *
     * @return string Description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the combining Algorithm to use for Policy's rule results
     *
     * @param mixed $algorithm Algorithm name or object instance
     * @return \Oasisphp\Policy instance
     */
    public function setAlgorithm($algorithm)
    {
        if (is_string($algorithm)) {
            $algorithmClass = '\\Oasisphp\\Algorithm\\'.$algorithm;
            if (!class_exists($algorithmClass)) {
                throw new \InvalidArgumentException('Invalid algorithm '.$algorithm);
            }
            $algorithm = new $algorithmClass();
        }
        $this->algorithm = $algorithm;
        return $this;
    }

    /**
     * Get the current combining Algorithm
     *
     * @return \Oasisphp\Algorithm Combining algorithm
     */
    public function getAlgorithm()
    {
        return $this->algorithm;
    }

    /**
     * Set the Polidy ID
     *
     * @param string $id Policy ID
     * @return string Policy ID
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the current Policy ID
     *
     * @return string Policy ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add an action
     *
     * @param \Oasisphp\Action $action Action instance
     */
    public function addAction(\Oasisphp\Action $action)
    {
        $this->action = $action;
    }

    /**
     * Get the current action
     *
     * @return \Oasisphp\Action Action instance
     */
    public function getAction()
    {
        return $this->action;
    }

}