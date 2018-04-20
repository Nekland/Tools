<?php

namespace spec\Nekland\Tools;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DateTimeComparatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Nekland\Tools\DateTimeComparator');
    }

    function it_should_return_greatest_date_time()
    {
        $dateTimeImmutable1 = new \DateTimeImmutable('+2 days');
        $dateTimeImmutable2 = new \DateTimeImmutable();

        $dateTime1 = new \DateTime('+2 days');
        $dateTime2 = new \DateTime();

        // DateTimeImmutable tests
        $this::greatest($dateTimeImmutable1, $dateTimeImmutable2)->shouldReturn($dateTimeImmutable1);
        $this::greatest($dateTimeImmutable2, $dateTimeImmutable1)->shouldReturn($dateTimeImmutable1);
        $this::greatest($dateTimeImmutable1, null)->shouldReturn($dateTimeImmutable1);
        $this::greatest(null, $dateTimeImmutable1)->shouldReturn($dateTimeImmutable1);

        // DateTime tests
        $this::greatest($dateTime1, $dateTime2)->shouldReturn($dateTime1);
        $this::greatest($dateTime2, $dateTime1)->shouldReturn($dateTime1);
        $this::greatest($dateTime1, null)->shouldReturn($dateTime1);
        $this::greatest(null, $dateTime1)->shouldReturn($dateTime1);
        
        $this::greatest(null, null)->shouldReturn(null);
    }

    function it_should_return_lowest_date_time()
    {
        $dateTimeImmutable1 = new \DateTimeImmutable();
        $dateTimeImmutable2 = new \DateTimeImmutable('+2 days');

        $dateTime1 = new \DateTime();
        $dateTime2 = new \DateTime('+2 days');

        // DateTimeImmutable tests
        $this::lowest($dateTimeImmutable1, $dateTimeImmutable2)->shouldReturn($dateTimeImmutable1);
        $this::lowest($dateTimeImmutable2, $dateTimeImmutable1)->shouldReturn($dateTimeImmutable1);
        $this::lowest($dateTimeImmutable1, null)->shouldReturn($dateTimeImmutable1);
        $this::lowest(null, $dateTimeImmutable1)->shouldReturn($dateTimeImmutable1);

        // DateTime tests
        $this::lowest($dateTime1, $dateTime2)->shouldReturn($dateTime1);
        $this::lowest($dateTime2, $dateTime1)->shouldReturn($dateTime1);
        $this::lowest($dateTime1, null)->shouldReturn($dateTime1);
        $this::lowest(null, $dateTime1)->shouldReturn($dateTime1);
        
        $this::lowest(null, null)->shouldReturn(null);
    }
}
