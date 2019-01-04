<?php

namespace Nekland\Utils\Test\Tempfile;

use Nekland\Utils\Tempfile\TemporaryDirectory;
use Nekland\Utils\Tempfile\TemporaryFile;
use PHPUnit\Framework\TestCase;

class TemporaryDirectoryTest extends TestCase
{
    public function testItCreateDirectoryOnInstantiation()
    {
        $directory = new TemporaryDirectory();
        $this->assertTrue(file_exists($directory->getPathname()));
    }

    public function testItGeneratesTemporaryFile()
    {
        $directory = new TemporaryDirectory();
        $this->assertInstanceOf(TemporaryFile::class, $directory->getTemporaryFile());
        $this->assertFalse($directory->isEmpty());
    }

    public function testItDoesNotRemoveDirectoryIfFileInside()
    {
        $directory = new TemporaryDirectory();
        $this->assertInstanceOf(TemporaryFile::class, $directory->getTemporaryFile());
        $directory->remove();
        $this->assertFalse($directory->hasBeenRemoved());
    }

    public function testItRemoveNonEmptyDirectoryIfIForceIt()
    {
        $directory = new TemporaryDirectory();
        $directory->getTemporaryFile();
        $directory->remove(true);
        $this->assertTrue($directory->hasBeenRemoved());
    }
}
