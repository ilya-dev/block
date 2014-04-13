<?php namespace Spec\Block;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Block\Comment;

class BlockSpec extends ObjectBehavior {

    function let()
    {
        $this->beConstructedWith(new \Block\Testing\Dummy);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Block\Block');
    }

    function it_validates_the_passed_argument_and_sets_the_object()
    {
        $this->shouldThrow('InvalidArgumentException')->duringSetObject(null);

        $object = new \stdClass;

        $this->shouldNotThrow('InvalidArgumentException')->duringSetObject($object);
    }

    function it_fetches_the_property_comment()
    {
        $comment  = new Comment('The Foo');
        $property = $this->property('foo');

        $property->shouldHaveType('Block\Comment');
        $property->shouldBeLike($comment);
    }

}

