<?php

namespace CS\Domain\model;

use CS\Domain\Exception\UnknownDirectionException;

class Direction
{
    const NORTH = 'N';
    const EAST = 'E';
    const WEST = 'W';
    const SOUTH = 'S';

    const INSTRUCTION_RIGHT = 'R';
    const INSTRUCTION_LEFT = 'L';

    /** @var string */
    private $direction;

    /**
     * @param string $direction
     */
    public function __construct($direction)
    {
        $this->direction = $direction;
    }

    /**
     * @param string $instruction
     */
    public function switchDirection($instruction)
    {
        $key = array_search($this->direction, $this->getAllPossibleDirection());

        switch ($instruction) {
            case self::INSTRUCTION_LEFT:
                $key--;
                break;
            case self::INSTRUCTION_RIGHT:
                $key++;
                break;
            default:
                throw new UnknownDirectionException($instruction);
        }

        if ($key < 0) {
            $key = $key + 4;
        }

        if ($key > 3) {
            $key = 4 - $key;
        }

        $this->direction = $this->getAllPossibleDirection()[$key];

        return $this->direction;
    }

    /**
     * @return array
     */
    private function getAllPossibleDirection()
    {
        return [self::NORTH, self::EAST, self::SOUTH, self::WEST];
    }

    /**
     * @return string
     */
    public function getDirection()
    {
        return $this->direction;
    }

    public function __toString()
    {
        return $this->getDirection();
    }
}
