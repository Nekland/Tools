<?php

namespace Nekland\Tools;

class StringTools
{
    /**
     * @param string $str
     * @param string $from
     * @param string $encoding
     * @param bool $normalize  Removes the formatting inside parts of the given strings. Makes sense most part of the time.
     * @return string
     */
    public static function camelize($str, $from = '_', $encoding = 'UTF-8', $normalize = true)
    {
        $items = explode($from, $str);

        if ($normalize) {
            $items = array_map(function ($item) use ($encoding) {
                // Removes special characters
                $item = preg_replace('/[^A-Za-z0-9]/', '', $item);
                // Lowercase the whole string (otherwise it's not camelize)
                return mb_strtolower($item, $encoding);
            }, $items);
        }

        return implode('',
            array_map(
            // Up the first letter for each sub string
                function ($item) use ($encoding) {
                    return StringTools::mb_ucfirst($item, $encoding);
                },
                $items
            )
        );
    }

    /**
     * @param string $str
     * @param string $start
     * @return bool
     */
    public static function startsWith($str, $start)
    {
        $length = strlen($start);

        return substr($str, 0, $length) === $start;
    }

    /**
     * @param string $str
     * @param string $end
     * @return bool
     */
    public static function endsWith($str, $end)
    {
        $length = strlen($end);
        if ($length === 0) {
            return true;
        }

        return substr($str, -$length, $length) === $end;
    }

    /**
     * @param string $str
     * @param string $toRemove
     * @return string
     */
    public static function removeStart($str, $toRemove)
    {
        if (!StringTools::startsWith($str, $toRemove)) {
            return $str;
        }
        $sizeToRemove = strlen($toRemove);

        return substr($str, $sizeToRemove, strlen($str) - $sizeToRemove);
    }

    /**
     * @param string $str
     * @param string $toRemove
     * @return string
     */
    public static function removeEnd($str, $toRemove)
    {
        if (!StringTools::endsWith($str, $toRemove)) {
            return $str;
        }
        $sizeToRemove = strlen($toRemove);

        return substr($str, 0, - $sizeToRemove);
    }

    /**
     * @param string $str       The string that should contains the needle
     * @param string $needle    What should be contained
     * @return bool
     */
    public static function contains($str, $needle)
    {
        $position = mb_strpos($str, $needle, 0);
        if ($position === 0) {
            return true;
        }

        return (bool) $position;
    }

    /**
     * This function is missing in PHP for now.
     *
     * @param string $str
     * @param string $encoding
     * @return string
     */
    public static function mb_ucfirst($str, $encoding = 'UTF-8')
    {
        $length = mb_strlen($str, $encoding);
        $firstChar = mb_substr($str, 0, 1, $encoding);
        $then = mb_substr($str, 1, $length - 1, $encoding);

        return mb_strtoupper($firstChar, $encoding) . $then;
    }
}
