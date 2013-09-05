<?php

namespace Oasisphp;

/**
 * Rule target containing Match set
 *
 * @package Oasisphp
 */
class Target
{
    /**
     * Set of Matches for a Target
     * @var array
     */
    private $matches = array();

    /**
     * Add a new Match to the Target set
     *
     * @param \Oasisphp\Match $match Match instance
     * @return \Oasisphp\Target
     */
    public function addMatch(\Oasisphp\Match $match)
    {
        $this->matches[] = $match;
        return $this;
    }

    /**
     * Add multiple new Matches to the set
     *
     * @param array $matches Multiple matches
     */
    public function addMatches(array $matches)
    {
        foreach ($matches as $match) {
            $this->addMatch($match);
        }
        return $this;
    }

    /**
     * Get the current set of Matches
     *
     * @return array Matches set
     */
    public function getMatches()
    {
        return $this->matches;
    }
}