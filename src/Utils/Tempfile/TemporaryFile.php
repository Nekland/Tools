<?php
/**
 * This file is a part of NeklandTools package.
 *
 * (c) Nekland <github@nekland.fr>
 *
 * For the full license, take a look to the LICENSE file
 * on the root directory of this project
 */

namespace Nekland\Utils\Tempfile;

use Nekland\Utils\Exception\LogicException;
use Nekland\Utils\Exception\RuntimeException;
use Nekland\Utils\Tempfile\Exception\CannotCreateFileException;
use Nekland\Utils\Tempfile\Exception\ImpossibleToUpdateFileException;
use Nekland\Utils\Tempfile\Exception\TemporaryFileAlreadyRemovedException;

class TemporaryFile
{
    /**
     * Tmp dir path. Do not use this var directly, uses `getTmpDirectory`.
     * @var TemporaryDirectory
     */
    private static $tmpDirectory;

    /** @var string */
    private $file;

    /** @var TemporaryDirectory */
    private $tmpDir;

    /** @var bool */
    private $removed;

    public function __construct(TemporaryDirectory $dir = null, $prefix = '')
    {
        $this->removed = false;
        $this->tmpDir = $dir;

        if (null === $this->tmpDir) {
            $this->tmpDir = self::getTmpDirectory();
        }
        $path = $this->tmpDir->getPathname() . DIRECTORY_SEPARATOR . $prefix . \uniqid();

        if (\touch($path) === false) {
            throw new CannotCreateFileException(\sprintf(
                'Impossible to write new file in "%s".',
                $path
            ));
        }

        $this->file = $path;
    }

    /**
     * @return string
     */
    public function getPathname()
    {
        return $this->file;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        if ($this->removed) {
            throw new TemporaryFileAlreadyRemovedException($this->file);
        }
        if (!\file_put_contents($this->file, $content)) {
            throw new ImpossibleToUpdateFileException(sprintf(
                'Impossible to put contents in file "%s"',
                $this->file
            ));
        }
    }

    /**
     * @return bool
     */
    public function hasBeenRemoved()
    {
        return $this->removed;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        if ($this->removed) {
            throw new LogicException('The file has been removed definitely and cannot be accessed anymore');
        }

        $content = \file_get_contents($this->file);

        if ($content === false) {
            throw new RuntimeException(sprintf(
                'Impossible to retrieve content of file "%s".',
                $this->file
            ));
        }

        return $content;
    }

    /**
     * Removes the temporary file. Please consider unset the object instead.
     */
    public function remove()
    {
        if ($this->removed) {
            return;
        }

        if (!\unlink($this->file)) {
            throw new RuntimeException(sprintf('Impossible to remove file "%s"', $this->file));
        }

        $this->removed = true;
    }

    private static function getTmpDirectory()
    {
        if (null === self::$tmpDirectory) {
            return self::$tmpDirectory = new TemporaryDirectory();
        }

        return self::$tmpDirectory;
    }
}
