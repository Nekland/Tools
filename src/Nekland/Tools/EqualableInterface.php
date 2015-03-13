<?php

namespace Nekland\Tools;

interface EqualableInterface
{
    /**
     * @var mixed $item The item to compare
     * @return boolean
     */
    public function equals($item);
}

