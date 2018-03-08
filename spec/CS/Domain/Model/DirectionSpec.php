<?php

namespace spec\CS\Domain\Model;

use CS\Domain\Exception\UnknownDirectionException;
use CS\Domain\model\Direction;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DirectionSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(Direction::NORTH);
    }


    function it_does_switch_direction_as_expected()
    {
        $this->switchDirection('R')->shouldReturn(Direction::EAST);
        $this->switchDirection('R')->shouldReturn(Direction::SOUTH);
        $this->switchDirection('L')->shouldReturn(Direction::EAST);
        $this->switchDirection('R')->shouldReturn(Direction::SOUTH);
        $this->switchDirection('R')->shouldReturn(Direction::WEST);
        $this->switchDirection('R')->shouldReturn(Direction::NORTH);
    }

    function it_doesnt_switch_direction_as_expected()
    {
        $this->shouldThrow(UnknownDirectionException::class)
            ->during('switchDirection', ['fake_direction']);
    }
}
