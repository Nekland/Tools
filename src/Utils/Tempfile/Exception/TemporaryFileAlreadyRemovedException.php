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

use Nekland\Utils\Exception\LogicException;

class TemporaryFileAlreadyRemovedException extends LogicException
{
    public function __construct($path = "", $code = 0, $previous = null)
    {
        $message = \sprintf('The file "%s" has already been removed.', $path);
        parent::__construct($message, $code, $previous);
    }
}
