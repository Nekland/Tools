<?php

namespace Nekland\Tools;

class DateTimeComparator
{
    /**
     * Get the greatest "DateTimeInterface" from the parameters
     * @param mixed $datetimes,... A various number of instances implementing `DateTimeInterface`
     * @return \DateTimeInterface|null
     */
    public static function greatest(... $datetimes)
    {
        $greatest = null;
        foreach ($datetimes as $datetime) {
            if (!$datetime instanceof \DateTimeInterface) {
                continue;
            }

            if ($datetime > $greatest || null === $greatest) {
                $greatest = $datetime;
            }
        }

        return $greatest;
    }

    /**
     * Get the lowest "DateTimeInterface" from the parameters
     * @param mixed $datetimes,... A various number of instances implementing `DateTimeInterface`
     * @return \DateTimeInterface|null
     */
    public static function lowest(... $datetimes)
    {
        $lowest = null;
        foreach ($datetimes as $datetime) {
            if (!$datetime instanceof \DateTimeInterface) {
                continue;
            }

            if ($datetime < $lowest || null === $lowest) {
                $lowest = $datetime;
            }
        }

        return $lowest;
    }
}
