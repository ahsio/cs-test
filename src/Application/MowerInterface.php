<?php

namespace CS\Application;

use CS\Domain\Model\Position;

interface MowerInterface
{
    /**
     * @param array $instructions
     * @return Position
     */
    public function applyInstructions(array $instructions);
}
