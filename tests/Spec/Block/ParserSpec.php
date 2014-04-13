<?php namespace Spec\Block;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ParserSpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('Block\Parser');
    }

    function it_can_make_a_raw_comment_prettier()
    {
        $comment = "/**\n     * The Foo\n     *\n     * @var string\n     */";

        $this->transformRaw($comment)->shouldReturn("The Foo\n@var string");
    }

}
