<?php namespace Spec\Block;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LineSpec extends ObjectBehavior {

    function let()
    {
        $this->beConstructedWith('@param int $speed');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Block\Line');
    }

}

