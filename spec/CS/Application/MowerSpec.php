<?php

namespace spec\CS\Application;

use CS\Domain\model\Direction;
use CS\Domain\Model\Lawn;
use CS\Domain\Model\Position;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MowerSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(
            1, 2, 'N', new Lawn(new Position(5, 5))
        );
    }


    function it_does_move_as_expected()
    {
        $this->applyInstructions(['L', 'F', 'L', 'F', 'L', 'F', 'L', 'F', 'F'])->__toString()
            ->shouldReturn('1 3 N');
    }
}
