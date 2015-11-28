<?php

namespace Xacmlphp;

class Match
{
    /**
     * Match ID (ex. "TestMatch1")
     * @var string
     */
    private $id = null;

    /**
     * Set of match Attributes
     * @var array
     */
    private $attributes = array();

    /**
     * Current match Operation (Ex. "StringEqual")
     * @var string
     */
    private $operation = null;

    /**
     * Match designator (the Attribute name to match on in Subject)
     * @var string
     */
    private $designator = null;

    /**
     * Match value (value to match on Subject attributes)
     * @var string
     */
    private $value = null;

    /**
     * Init the object with some optional settings
     *
     * @param string $operation Operation type
     * @param string $designator Property name to match
     * @param string $id Unique ID for the match instance
     * @param string $value Value to match
     */
    public function __construct($operation = null, $designator = null, $id = null, $value = null)
    {
        if ($operation !== null) {
            $this->setOperation($operation);
        }
        if ($designator !== null) {
            $this->setDesignator($designator);
        }
        if ($value !== null) {
            $this->setValue($value);
        }
        if ($id !== null) {
            $this->setId($id);
        }
    }

    /**
     * Set the Match ID (Ex. "TestMatch1")
     *
     * @param string $id Match identifier
     * @return \Xacmlphp\Match instance
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the current Match identifier
     *
     * @return string Match identifier
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add a match Attribute
     *
     * @param \Xacmlphp\Attribute $attribute New attribute
     *
     * @return $this
     */
    public function addAttribute(\Xacmlphp\Attribute $attribute)
    {
        $this->attributes[] = $attribute;
        return $this;
    }

    /**
     * Get the current attribute set
     *
     * @return array Attribute set
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Set the current designator (Property name/path to match)
     *
     * @param string $designator Designator name
     * @return \Xacmlphp\Match instance
     */
    public function setDesignator($designator)
    {
        $this->designator = $designator;
        return $this;
    }

    /**
     * Get the current designator (Property name to match)
     *
     * @return string Designator value
     */
    public function getDesignator()
    {
        return $this->designator;
    }

    /**
     * Set the current evaluation option for the Match
     *
     * @param string $operation Evaluation type
     * @return \Xacmlphp\Match instance
     */
    public function setOperation($operation)
    {
        $this->operation = $operation;
        return $this;
    }

    /**
     * Get the current operation value
     *
     * @return string Operation name
     */
    public function getOperation()
    {
        return $this->operation;
    }

    /**
     * Set the value to use for the matching
     *
     * @param mixed $value Match value
     * @return \Xacmlphp\Match instance
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * Get the current match value
     *
     * @return mixed Match value
     */
    public function getValue()
    {
        return $this->value;
    }
}