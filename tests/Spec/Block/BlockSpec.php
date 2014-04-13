<?php namespace Spec\Block;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BlockSpec extends ObjectBehavior {

    function let()
    {
        $this->beConstructedWith(new \Block\Testing\Dummy);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Block\Block');
    }

}

