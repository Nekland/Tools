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
use Nekland\Utils\Tempfile\Exception\ImpossibleToCreateDirectoryException;

class TemporaryDirectory
{
    /** @var string */
    private $dir;

    /** @var bool */
    private $removed;

    /** @var string[] */
    private $files;

    /**
     * @param null|string $dir
     * @param string      $prefix
     */
    public function __construct(string $dir = null, string $prefix = 'phpgenerated')
    {
        $this->files = [];
        $this->removed = false;
        if (null !== $dir && \is_dir($dir)) {
            if (!is_writable($dir)) {
                throw new LogicException(\sprintf('The directory "%s" is not writeable.', $dir));
            }

            $this->dir = $dir;
            return;
        }

        if (null === $this->dir) {
            $this->dir = \sys_get_temp_dir() . '/' . $prefix . '_' . \uniqid();
        }

        if (\mkdir($this->dir) === false) {
            throw new ImpossibleToCreateDirectoryException($this->dir);
        }
    }

    /**
     * Generates a TemporaryFile from the current TemporaryDirectory
     *
     * @return TemporaryFile
     */
    public function getTemporaryFile()
    {
        return $this->files[] = new TemporaryFile($this);
    }

    /**
     * @return string
     */
    public function getPathname()
    {
        return $this->dir;
    }

    /**
     * Removes directory. In case the directory contains files, it will not be removed.
     * Unless you specify $force to true.
     *
     * @param bool $force
     */
    public function remove($force = false)
    {
        $isEmpty = $this->isEmpty();
        if ($force && !$isEmpty) {
            $it = new \RecursiveDirectoryIterator($this->dir, \RecursiveDirectoryIterator::SKIP_DOTS);
            $files = new \RecursiveIteratorIterator($it, \RecursiveIteratorIterator::CHILD_FIRST);
            foreach($files as $file) {
                if ($file->isDir()){
                    \rmdir($file->getRealPath());
                } else {
                    \unlink($file->getRealPath());
                }
            }

            \rmdir($this->dir);
            $this->removed = true;

            return;
        }

        if ($isEmpty) {
            \rmdir($this->dir);
            $this->removed = true;
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
     * @return bool
     */
    public function isEmpty()
    {
        return !(new \FilesystemIterator($this->dir))->valid();
    }
}
