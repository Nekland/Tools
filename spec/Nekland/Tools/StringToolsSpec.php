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
        $this::camelize('foo🍕', '-', 'UTF-8', false)->shouldReturn('Foo🍕');
    }

    function it_should_transform_kebab_case_to_camel_case()
    {
        $this::camelize('hello-world', '-')->shouldReturn('HelloWorld');
        $this::camelize('foo-🍕-bar', '-', 'UTF-8', false)->shouldReturn('Foo🍕Bar');
    }

    function it_should_be_able_to_camelize_anything()
    {
        $this::camelize('something cool', ' ')->shouldReturn('SomethingCool');
    }

    function it_should_be_able_to_not_normalize_as_well_as_normalize_on_camelize()
    {
        $this::camelize('hello-theWorld', '-', 'UTF-8', false)->shouldReturn('HelloTheWorld');
        $this::camelize('hello-the (world)', '-')->shouldReturn('HelloTheworld');
    }

    function it_should_check_if_string_starts_with_needle()
    {
        $this::startsWith('Lorem ipsum heyà', 'Lorem')->shouldReturn(true);
        $this::startsWith(' Lorem ipsum heyà', 'Lorem')->shouldReturn(false);
        $this::startsWith("\nLorem ipsum heyà", 'Lorem')->shouldReturn(false);
        $this::startsWith(' ipsum heyà Lorem', 'Lorem')->shouldReturn(false);
        $this::startsWith(' ipsum heyà Lorem', '')->shouldReturn(true);
        $this::startsWith('Lorem 🍕 ipsum', 'Lorem 🍕')->shouldReturn(true);
    }

    function it_should_check_if_string_ends_with_needle()
    {
        $this::endsWith('Foo bar baz ça marche', 'marche')->shouldReturn(true);
        $this::endsWith('Foo bar baz ça marche ', 'marche')->shouldReturn(false);
        $this::endsWith('Foo bar marche baz ça ', 'marche')->shouldReturn(false);
        $this::endsWith('marche Foo bar baz ça ', 'marche')->shouldReturn(false);
        $this::endsWith('marche Foo bar baz ça ', '')->shouldReturn(true);
        $this::endsWith('Hello my 🍕 world !', '🍕 world !')->shouldReturn(true);
    }

    function it_should_remove_the_start_of_a_string()
    {
        $this::removeStart('Foo bar baz', 'Foo')->shouldReturn(' bar baz');
        $this::removeStart('I really ❤️ 🍕 !', 'I really ❤️')->shouldReturn(' 🍕 !');
        $this::removeStart('YOLOOOsgs gs gsg sggs g', 'g')->shouldReturn('YOLOOOsgs gs gsg sggs g');
    }

    function it_should_contain_str()
    {
        $this::contains('PHP Test India vous êtes accepté', 'accepté')->shouldReturn(true);
        $this::contains('PHP Test India vous êtes accepté', 'êtes accepté')->shouldReturn(true);
        $this::contains('PHP Test India vous êtes accepté', 'vous êtes accepté')->shouldReturn(true);
        $this::contains('PHP Test India vous êtes accepté', 'Test India vous êtes accepté')->shouldReturn(true);
        $this::contains('PHP Test India vous êtes accepté', 'PHP')->shouldReturn(true);
        $this::contains('PHP Test India vous êtes accepté', 'PHP Test India vous êtes accepté')->shouldReturn(true);
        $this::contains('PHP Test India vous êtes accepté', 'coucou le test')->shouldReturn(false);
        $this::contains('PHP Test India vous êtes accepté', 'PHP Test India vous êtes accepte')->shouldReturn(false);
        $this::contains('PHP Test India vous êtes accepté', 'PHP Test India vous êtes refusé')->shouldReturn(false);
        $this::contains('PHP Test India vous êtes accepté', 'Lorem Ipsum vous êtes accepté')->shouldReturn(false);
        $this::contains('PHP Test India vous êtes accepté', 'Lorem Ipsum vous êtes refusé')->shouldReturn(false);
        $this::contains('Theres nothing to see here', 'there there')->shouldReturn(false);
        $this::contains('Hello everybody, how are you today ? :)', 'everybody, how')->shouldReturn(true);
        $this::contains('Hello world ! =)', '.+')->shouldReturn(false);
        $this::contains('Hello world ! 😀', '! 😀')->shouldReturn(true);
        $this::contains('Hello 👽 aliens !', 'aliens')->shouldReturn(true);
    }

    function it_should_uppercase_first_letter_with_ucfirst()
    {
        $this::mb_ucfirst('hello')->shouldReturn('Hello');
        $this::mb_ucfirst('helloWorlD')->shouldReturn('HelloWorlD');
        $this::mb_ucfirst('HelloWorld')->shouldReturn('HelloWorld');
        $this::mb_ucfirst('🍕isReallyGood')->shouldReturn('🍕isReallyGood');
    }

    function it_should_remove_given_end_of_string()
    {
        $this::removeEnd('I\'m some random text with end to remove', 'end to remove')->shouldReturn('I\'m some random text with ');
        $this::removeEnd('I like 🍪 so I remove 🍕', ' so I remove 🍕')->shouldReturn('I like 🍪');
        $this::removeEnd('I like pizza', ' and cookies')->shouldReturn('I like pizza');
    }
}
