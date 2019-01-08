<?php

namespace spec\Nekland\Tools;

use Nekland\Tools\DateTimeComparator;
use PhpSpec\ObjectBehavior;

class DateTimeComparatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(DateTimeComparator::class);
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

    function it_should_can_handle_multiple_datetimes()
    {
        $dateTime1 = new \DateTimeImmutable();
        $dateTime2 = new \DateTimeImmutable('+2 days');
        $dateTime3 = new \DateTimeImmutable('+4 days');
        $dateTime4 = new \DateTimeImmutable('+6 days');

        $this::lowest($dateTime2, $dateTime1, $dateTime4, $dateTime3)->shouldReturn($dateTime1);
        $this::greatest($dateTime3, $dateTime4, $dateTime1, $dateTime2)->shouldReturn($dateTime4);
    }

    function it_should_return_null_if_no_datetime_given()
    {
        $this::lowest('this', 'is', 0, false, new \Exception())->shouldReturn(null);
        $this::greatest('this', 'is', 0, false, new \Exception())->shouldReturn(null);
    }
}
