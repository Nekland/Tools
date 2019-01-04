<?php
/**
 * This file is a part of NeklandTools package.
 *
 * (c) Nekland <github@nekland.fr>
 *
 * For the full license, take a look to the LICENSE file
 * on the root directory of this project
 */

namespace Nekland\Utils\Tempfile\Exception;

use Nekland\Utils\Exception\RuntimeException;

class ImpossibleToCreateDirectoryException extends RuntimeException
{
    public function __construct($directory = "", $code = 0, $previous = null)
    {
        parent::__construct(sprintf('Impossible to create directory "%s".', $directory), $code, $previous);
    }
}
