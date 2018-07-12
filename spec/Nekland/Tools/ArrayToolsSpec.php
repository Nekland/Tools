<?php

namespace spec\Nekland\Tools;

use Nekland\Tools\ArrayTools;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ArrayToolsSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Nekland\Tools\ArrayTools');
    }

    function it_should_remove_value()
    {
        $array = [
            'foo',
            'bar',
        ];

        ArrayTools::removeValue($array, $array[1]);

        \expect($array)->toBe([$array[0]]);
    }
}
