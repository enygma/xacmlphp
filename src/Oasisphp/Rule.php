<?php

namespace Oasisphp;

class Rule
{
    private $target = null;

    private $id = null;

    private $description = null;

    private $effect = null;

    private $obligations = array();

    private $advice = array();

    private $algorithm = null;

    public function validate()
    {
        return false;
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

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    public function getId()
    {
        return $this->id;
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

    public function setEffect($effect)
    {
        $this->effect = $effect;
        return $this;
    }
    public function getEffect()
    {
        return $this->effect;
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