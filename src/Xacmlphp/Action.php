<?php

namespace Xacmlphp;

class Action
{
    /**
     * Action type
     * @var string
     */
    private $type = null;

    /**
     * Init the object and set the type if given
     *
     * @param string $type Action type
     */
    public function __construct($type = null)
    {
        if ($type !== null) {
            $this->setType($type);
        }
    }

    /**
     * Set the action type
     *
     * @param string $type Action type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * Get the current action type
     *
     * @return string Action type
     */
    public function getType()
    {
        return $this->type;
    }
}