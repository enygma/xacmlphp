<?php

namespace Oasisphp;

class Policy
{
    private $rules = array();

    private $target = null;

    private $algorithm = null;

    private $version = '1.0';

    private $obligations = array();

    private $advice = array();

    private $description = '';

    private $id = null;

    public function addRule(\Oasisphp\Rule $rule)
    {
        $this->rules[] = $rule;
        return $this;
    }

    public function getRules()
    {
        return $this->rules;
    }

    public function setTarget($target)
    {
        $this->target = $target;
        return $this;
    }
    public function getTarget()
    {
        return $this->target;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }
    public function getDescription()
    {
        return $this->description;
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

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

}