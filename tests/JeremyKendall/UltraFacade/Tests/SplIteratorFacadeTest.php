<?php

namespace JeremyKendall\UltraFacade\Tests;

use JeremyKendall\UltraFacade\SplIteratorFacade;

class SplIteratorFacadeTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    public function testFacadeForRecursiveDirectoryIterator()
    {
        $it = SplIteratorFacade::facade('RecursiveDirectory', array(__DIR__));
        $this->assertInstanceOf('RecursiveDirectoryIterator', $it);
    }

    public function testFacadeForRecursiveDirectoryIteratorImproperCase()
    {
        $it = SplIteratorFacade::facade('recursiveDirectory', array(__DIR__));
        $this->assertInstanceOf('RecursiveDirectoryIterator', $it);
    }

    public function testFacadeForRecursiveDirectoryFullIteratorName()
    {
        $it = SplIteratorFacade::facade('RecursiveDirectoryIterator', array(__DIR__));
        $this->assertInstanceOf('RecursiveDirectoryIterator', $it);
    }

    public function testInvalidNameThrowsException()
    {
        $this->setExpectedException(
            'InvalidArgumentException',
            'No such SPL iterator exists.'
        );
        $it = SplIteratorFacade::facade('Wtf', array(__DIR__));
    }
}
