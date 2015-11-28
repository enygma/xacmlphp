<?php

namespace Xacmlphp;

/**
 * Rule target containing Match set
 *
 * @package Xacmlphp
 */
class Target
{
    /**
     * Set of Matches for a Target
     *
     * @var array
     */
    private $matches = array();

    /**
     * Add a new Match to the Target set
     *
     * @param Match $match Match instance
     *
     * @return \Xacmlphp\Target
     */
    public function addMatch(Match $match)
    {
        $this->matches[] = $match;
        return $this;
    }

    /**
     * Add multiple new Matches to the set
     *
     * @param array $matches Multiple matches
     *
     * @return $this
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