<?php

namespace Nekland\Tools;

class ArrayTools
{
    /**
     * Remove a value from the list
     *
     * @param array $array The array in which we have to remove value
     * @param mixed $value The value to remove from the list
     */
    public static function removeValue(array &$array, $value)
    {
        $index = \array_search($value, $array);
        if (false !== $index) {
            unset($array[$index]);
        }
    }
}
