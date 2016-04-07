<?php

namespace Nekland\Tools;

class StringTools
{
    public static function camelize($str, $from='_')
    {
        if (!in_array($from, ['_', '-'])) {
            throw new \InvalidArgumentException('We can camelize only from snake case or kebab case.');
        }

        return implode('', array_map('ucfirst', array_map('strtolower', explode($from, $str))));
    }
}
