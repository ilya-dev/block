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

    function it_validates_the_passed_argument_and_sets_the_line()
    {
        $this->shouldThrow($e = 'InvalidArgumentException')->duringSetLine(null);

        $this->shouldNotThrow($e)->duringSetLine('foo');
    }

}

