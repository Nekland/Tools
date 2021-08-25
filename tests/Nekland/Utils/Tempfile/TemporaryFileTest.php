<?php

namespace Nekland\Utils\Test\Tempfile;

use Nekland\Utils\Exception\LogicException;
use Nekland\Utils\Tempfile\TemporaryFile;
use PHPUnit\Framework\TestCase;

class TemporaryFileTest extends TestCase
{
    public function testItCreateFile()
    {
        $file = new TemporaryFile();
        $this->assertFileExists($file->getPathname());
    }

    public function testItRemovesFile()
    {
        $file = new TemporaryFile();
        $file->remove();

        $this->assertTrue($file->hasBeenRemoved());
    }

    public function testItSetContentsAndRetrieveIt()
    {
        $file = new TemporaryFile();
        $file->setContent('foobar');
        $this->assertEquals('foobar', $file->getContent());
    }

    public function testItCannotGetContentOfRemovedFile()
    {
        $this->expectException(LogicException::class);
        $file = new TemporaryFile();
        $file->setContent('hello');
        $file->remove();
        $file->getContent();
    }
}
