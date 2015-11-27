<?php

namespace Xacmlphp;

class Rule
{
    /**
     * Target path for Rule
     *
     * @var string
     */
    private $target = null;

    /**
     * Rule ID (Ex. "Rule1")
     *
     * @var string
     */
    private $id = null;

    /**
     * Brief Rule description
     *
     * @var string
     */
    private $description = null;

    /**
     * Rule effect (can only be "PERMIT" or "DENY")
     *
     * @var string
     */
    private $effect = null;

    /**
     * Obligations to follow after Rule is complete
     *
     * @var array
     */
    private $obligations = array();

    /**
     * Advice to conditionally follow after rule is complete
     *
     * @var array
     */
    private $advice = array();

    /**
     * Combining algorithm for the Rule's matches
     *
     * @var Algorithm instance
     */
    private $algorithm = null;

    /**
     * Set the Rule description
     *
     * @param string $description Rule description
     *
     * @return \Xacmlphp\Rule instance
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get the current Rule description
     *
     * @return string Rule description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the current Rule ID (Ex. "Rule1")
     *
     * @param string $id Rule identifier
     *
     * @return \Xacmlphp\Rule instance
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the current Rule identifier
     *
     * @return string Rule ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the Rule target path
     *
     * @param string $target Target path
     *
     * @return \Xacmlphp\Rule instance
     */
    public function setTarget($target)
    {
        $this->target = $target;
        return $this;
    }

    /**
     * Get the current Rule target
     *
     * @return Target path
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * Set the Rule effect (either "PERMIT" or "DENY")
     *
     * @param string $effect Rule effect
     *
     * @throws \InvalidArgumentException If invalid effect option
     * @return \Xacmlphp\Rule instance
     */
    public function setEffect($effect)
    {
        $effect = strtoupper($effect);
        if ($effect !== "PERMIT" && $effect !== "DENY") {
            throw new \InvalidArgumentException('Invalid effect setting ' . $effect);
        }
        $this->effect = $effect;
        return $this;
    }

    /**
     * Get the current Rule effect ("PERMIT" or "DENY")
     *
     * @return string Rule effect
     */
    public function getEffect()
    {
        return $this->effect;
    }

    /**
     * Set the Rule combining algorithm
     *
     * @param Algorithm $algorithm Algorithm instance
     *
     * @return \Xacmlphp\Rule instance
     */
    public function setAlgorithm(Algorithm $algorithm)
    {
        $this->algorithm = $algorithm;
        return $this;
    }

    /**
     * Get the Rule's combining algorithm
     *
     * @return Algorithm instance
     */
    public function getAlgorithm()
    {
        return $this->algorithm;
    }
}