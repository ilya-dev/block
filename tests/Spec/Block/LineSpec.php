<?php namespace Spec\Block;

use PhpSpec\ObjectBehavior;

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
        $this->shouldThrow('InvalidArgumentException')->duringSetLine(null);

        $this->shouldNotThrow('InvalidArgumentException')->duringSetLine('foo');
    }

    function it_returns_the_line()
    {
        $line = $this->getLine();

        $line->shouldBeEqualTo('@param int $speed');
        $line->shouldBeEqualTo((string) $this->getWrappedObject());
    }

    function it_determines_whether_it_is_a_tag()
    {
        $this->isTag()->shouldBe(true);

        $this->setLine('foo');

        $this->isTag()->shouldBe(false);
    }

    function it_splits_the_line_into_tokens()
    {
        $this->tokenize()->shouldReturn(['@param', 'int', '$speed']);

        $this->setLine('some   dumb   line');

        $this->tokenize()->shouldReturn(['some', 'dumb', 'line']);
    }

    function it_strips_the_tag()
    {
        $this->setLine('@tag some cool @stuff');

        $this->stripTag()->shouldReturn('some cool @stuff');
    }

}
