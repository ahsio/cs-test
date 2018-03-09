<?php

namespace CS\Domain\Model;

class Lawn
{
    /** @var PositionInterface */
    private $limit;

    /**
     * @param PositionInterface $limit

     */
    public function __construct(PositionInterface $limit)
    {
        $this->limit = $limit;

    }

    /**
     * @param int $x
     * 
     * @return bool
     */
    public function canMoveThroughX($x)
    {
        if ($x < 0 || $x > $this->limit->getX()) {
            return false;
        }

        return true;
    }

    /**
     * @param int $y
     *
     * @return bool
     */
    public function canMoveThroughY($y)
    {
        if ($y < 0 || $y > $this->limit->getY()) {
            return false;
        }

        return true;
    }
}
