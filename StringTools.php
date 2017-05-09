<?php

namespace Nekland\Tools;

class StringTools
{
    /**
     * @param string $str
     * @param string $from
     * @return string
     */
    public static function camelize($str, $from = '_')
    {
        if (!in_array($from, ['_', '-'])) {
            throw new \InvalidArgumentException('We can camelize only from snake case or kebab case.');
        }

        return implode('', array_map('ucfirst', array_map('strtolower', explode($from, $str))));
    }

    /**
     * @param string $str
     * @param string $start
     * @param string $encoding
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
     * @param string $encoding
     * @return bool
     */
    public static function endsWith($str, $end, $encoding = 'UTF-8')
    {
        $length = mb_strlen($end, $encoding);
        if ($length === 0) {
            return true;
        }

        return mb_substr($str, -$length, $length, $encoding) === $end;
    }

    /**
     * @param string $str
     * @param string $toRemove
     * @param string $encoding
     * @return string
     */
    public static function removeStart($str, $toRemove, $encoding = 'UTF-8')
    {
        if (!StringTools::startsWith($str, $toRemove, $encoding)) {
            return $str;
        }
        $sizeToRemove = mb_strlen($toRemove, $encoding);

        return mb_substr($str, $sizeToRemove, mb_strlen($str, $encoding) - $sizeToRemove, $encoding);
    }

    /**
     * @param string $str       The string that should contains the needle
     * @param string $needle    What should be contained
     * @param string $encoding
     * @return bool
     */
    public static function contains($str, $needle, $encoding = 'UTF-8')
    {
        $position = mb_strpos($str, $needle, 0, $encoding);
        if ($position === 0) {
            return true;
        }

        return (bool) $position;
    }
}
