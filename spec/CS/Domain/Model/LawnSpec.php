<?php

namespace spec\CS\Domain\Model;

use CS\Domain\Model\Position;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LawnSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(
            new Position(5, 5)
        );
    }

    function it_doesnt_allow_such_moves_through_x()
    {
        $this->canMoveThroughX(6)->shouldReturn(false);
        $this->canMoveThroughX(-1)->shouldReturn(false);
    }

    function it_does_allow_such_moves_through_x()
    {
        $this->canMoveThroughX(3)->shouldReturn(true);
        $this->canMoveThroughX(0)->shouldReturn(true);
    }

    function it_doesnt_allow_such_moves_through_y()
    {
        $this->canMoveThroughY(6)->shouldReturn(false);
        $this->canMoveThroughY(-1)->shouldReturn(false);
    }

    function it_does_allow_such_moves_through_y()
    {
        $this->canMoveThroughY(3)->shouldReturn(true);
        $this->canMoveThroughY(0)->shouldReturn(true);
    }
}
