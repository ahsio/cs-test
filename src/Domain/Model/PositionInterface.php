<?php

namespace CS\Domain\Model;

interface PositionInterface
{
    public function switchDirection($instruction);
    public function moveForward();
    public function getX();
    public function getY();
}
