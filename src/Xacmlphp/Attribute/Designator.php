<?php

namespace Xacmlphp\Attribute;

class Designator
{
    private $mustBePresent = false;

    private $category = null;

    private $id = null;

    private $dataType = null;

    public function setMustBePresent($present = false)
    {
        $this->mustBePresent = $present;
    }
    public function getMustBePresent()
    {
        return $this->mustBePresent;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }
    public function getCategory()
    {
        return $this->category;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }

    public function setDataType($dataType)
    {
        $this->dataType = $dataType;
    }
    public function getDataType()
    {
        return $this->dataType;
    }
}