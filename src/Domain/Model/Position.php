<?php

namespace CS\Domain\Model;

class Position
{
    /** @var int */
    private $x;

    /** @var int */
    private $y;

    /** @var Direction */
    private $direction;

    /** @var Lawn */
    private $lawn;

    /**
     * @param int    $x
     * @param int    $y
     * @param string $direction
     * @param Lawn   $lawn
     */
    public function __construct($x, $y, $direction = null, Lawn $lawn = null)
    {
        $this->x = $x;
        $this->y = $y;

        if (null !== $direction) {
            $this->direction = new Direction($direction);
        }

        $this->lawn = $lawn;
    }

    /**
     * @param string $instruction
     */
    public function switchDirection($instruction)
    {
        $this->direction->switchDirection($instruction);
    }

    public function moveForward()
    {
        switch ($this->direction->getDirection()) {
            case Direction::NORTH:
                if ($this->lawn->canMoveThroughY($this->y + 1))
                    $this->y++;
                break;
            case Direction::EAST:
                if ($this->lawn->canMoveThroughX($this->x + 1))
                    $this->x++;
                break;
            case Direction::SOUTH:
                if ($this->lawn->canMoveThroughY($this->y - 1))
                    $this->y--;
                break;
            case Direction::WEST:
                if ($this->lawn->canMoveThroughX($this->x - 1))
                    $this->x--;
                break;
        }
    }

    /**
     * @return int
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * @param int $x
     */
    public function setX($x)
    {
        $this->x = $x;
    }

    /**
     * @return int
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * @param int $y
     */
    public function setY($y)
    {
        $this->y = $y;
    }

    /**
     * @return string
     */
    public function __toString() {
        return sprintf('%d %d %s', $this->x, $this->y, $this->direction);
    }
}
