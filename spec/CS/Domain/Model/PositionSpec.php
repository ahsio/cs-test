<?php

namespace spec\CS\Domain\Model;

use CS\Domain\model\Direction;
use CS\Domain\Model\Lawn;
use CS\Domain\Model\Position;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PositionSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(
            0, 0, 'N', new Lawn(new Position(5, 5))
        );
    }

    function it_does_move_to_the_targeted_position()
    {
        $this->moveForward();
        $this->getX()->shouldReturn(0);
        $this->getY()->shouldReturn(1);

        $this->switchDirection(Direction::INSTRUCTION_RIGHT);
        $this->moveForward();
        $this->getX()->shouldReturn(1);
        $this->getY()->shouldReturn(1);
    }

    function it_doesnt_move_to_the_targeted_position()
    {
        $this->switchDirection(Direction::INSTRUCTION_LEFT);
        $this->moveForward();
        $this->getX()->shouldReturn(0);
        $this->getY()->shouldReturn(0);
        $this->moveForward();
        $this->getX()->shouldReturn(0);
        $this->getY()->shouldReturn(0);
    }
}
