<?php

namespace spec\Nekland\Tools;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StringToolsSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Nekland\Tools\StringTools');
    }

    function it_should_transform_snake_case_to_camel_case()
    {
        $this::camelize('hello_world')->shouldReturn('HelloWorld');
    }

    function it_should_transform_kebab_case_to_camel_case()
    {
        $this::camelize('hello-world', '-')->shouldReturn('HelloWorld');
    }

    function it_should_not_transform_others_than_kebab_or_snake_case()
    {
        $this::shouldThrow('\InvalidArgumentException')->duringCamelize('hello@world', '@');
    }
}
