<?php

namespace Nekland\Tools;

class DateTimeComparator
{
    /**
     * Get the greatest DateTime between the twice given as parameter
     * If one DateTime is null, return the other
     * If the twice DateTime are null, return null
     */
    public static function greatest(\DateTimeInterface $dateTime1 = null, \DateTimeInterface $dateTime2 = null)
    {
        // - If one DateTime is null, return the other date
        // - If the twice DateTime are null, return null
        if (\is_null($dateTime1) || \is_null($dateTime2)) {
            return self::getNonNullableDateTime($dateTime1, $dateTime2);
        }

        return $dateTime1 > $dateTime2 ? $dateTime1 : $dateTime2;
    }

    /**
     * Get the lowest DateTime between the twice given as parameter
     * If one DateTime is null, return the other
     * If the twice DateTime are null, return null
     */
    public static function lowest(\DateTimeInterface $dateTime1 = null, \DateTimeInterface $dateTime2 = null)
    {
        // - If one DateTime is null, return the other date
        // - If the twice DateTime are null, return null
        if (\is_null($dateTime1) || \is_null($dateTime2)) {
            return self::getNonNullableDateTime($dateTime1, $dateTime2);
        }

        return $dateTime1 < $dateTime2 ? $dateTime1 : $dateTime2;
    }

    /**
     * Check which DateTime parameter is null
     * Use this method when you know that at least one or more DateTime is/are null
     * - Only one DateTime is null: return the other one which is the greatest/lowest DateTime by default
     * - The twice DateTime are null: return null since no DateTime could be returned
     */
    private static function getNonNullableDateTime(\DateTimeInterface $dateTime1 = null, \DateTimeInterface $dateTime2 = null)
    {
        if (\is_null($dateTime1) && \is_null($dateTime2)) {
            return null;
        }

        // If date1 is null, the only result can be date2
        if (\is_null($dateTime1)) {
            return $dateTime2;
        }

        // If date2 is null, the only result can be date1
        if (\is_null($dateTime2)) {
            return $dateTime1;
        }
    }
}
