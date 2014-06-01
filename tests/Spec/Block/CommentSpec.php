<?php namespace Spec\Block;

use PhpSpec\ObjectBehavior;

class CommentSpec extends ObjectBehavior {

    function let()
    {
        $this->beConstructedWith('dummy comment');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Block\Comment');
    }

    function it_validates_the_passed_argument_and_sets_the_comment()
    {
        $this->shouldThrow('InvalidArgumentException')
             ->duringSetComment(null);

        $this->shouldNotThrow('InvalidArgumentException')
             ->duringSetComment('dumb');
    }

    function it_returns_the_comment()
    {
        $this->getComment()->shouldReturn('dummy comment');

        $this->getComment()->shouldBeEqualTo((string) $this->getWrappedObject());
    }

    function it_splits_the_comment_into_an_array_of_lines()
    {
        $lines = $this->getLines();

        $lines->shouldBeArray();
        $lines->shouldHaveCount(1);
        $lines->shouldAllHaveType('Block\Line');
    }

    /**
     * Get the inline matchers.
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
                    if ( ! $subject instanceof $type)
                    {
                        return false;
                    }
                }

                return true;
            }
        ];
    }

}
