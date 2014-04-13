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
        $comment  = new Comment("The Foo\n@var string");
        $property = $this->property('foo');

        $property->shouldHaveType('Block\Comment');
        $property->shouldBeLike($comment);
    }

    function it_throws_an_exception_if_the_property_does_not_exist()
    {
        $this->shouldThrow('UnexpectedValueException')->duringProperty(\uniqid());
    }

    function it_fetches_all_existing_properties()
    {
        $properties = $this->properties();

        $properties->shouldBeArray();
        $properties->shouldHaveCount(3);
        $properties->shouldAllHaveType('Block\Comment');
    }

    function it_can_filter_the_array_of_properties()
    {
        $this->properties(\ReflectionProperty::IS_PUBLIC)
             ->shouldHaveCount(1);
    }

    /**
     * Get the inline matchers
     *
     * @return array
     */
    public function getMatchers()
    {
        return [
            'allHaveType' => function(array $subjects, $type)
            {
                foreach ($subjects as $subject)
                {
                    if ( ! ($subject instanceof $type)) return false;
                }

                return true;
            },
        ];
    }

}

