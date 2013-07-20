<?php

namespace Oasisphp;

class Target
{
    private $matches = array();

    public function addMatch(\Oasisphp\Match $match)
    {
        $this->matches[] = $match;
        return $this;
    }
    public function addMatches(array $matches)
    {
        foreach ($matches as $match) {
            $this->addMatch($match);
        }
    }
    public function getMatches()
    {
        return $this->matches;
    }
}