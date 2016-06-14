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
     * @return bool
     */
    public static function startsWith($str, $start)
    {
        $length = mb_strlen($start);
        return substr($str, 0, $length) === $start;
    }

    /**
     * @param string $str
     * @param string $end
     * @return bool
     */
    public static function endsWith($str, $end)
    {
        $length = mb_strlen($end);
        if ($length === 0) {
            return true;
        }
        return substr($str, -$length) === $end;
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

        return mb_substr($str, mb_strlen($toRemove));
    }
}
