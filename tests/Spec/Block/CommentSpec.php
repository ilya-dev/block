<?php namespace Spec\Block;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CommentSpec extends ObjectBehavior {

    function let()
    {
        $comment = 'dummy comment';

        $this->beConstructedWith($comment);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Block\Comment');
    }

    function it_validates_the_passed_argument_and_sets_the_comment()
    {
        $this->shouldThrow('InvalidArgumentException')->duringSetComment(null);

        $this->shouldNotThrow('InvalidArgumentException')->duringSetComment('dumb');
    }

}

