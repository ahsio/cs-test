<?php

namespace CS\Application;

use CS\Application\Exception\UnknownInstructionException;
use CS\Domain\Model\Position;

class Mower implements MowerInterface
{
    /** @var Position */
    private $actualMowerPosition;

    /**
     * @param int $initialXPosition
     * @param int $initialYPosition
     * @param string $direction
     * @param Lawn $lawn
     */
    public function __construct($initialXPosition, $initialYPosition, $direction, $lawn)
    {
        $this->actualMowerPosition = new Position($initialXPosition, $initialYPosition, $direction, $lawn);
    }

    /**
     * {@inheritdoc}
     */
    public function applyInstructions(array $instructions)
    {
        foreach ($instructions as $instruction) {
            if ($instruction !== 'F') {
                $this->actualMowerPosition->switchDirection($instruction);
                continue;
            }

            $this->actualMowerPosition->moveForward();
        }

        return $this->actualMowerPosition;
    }
}
