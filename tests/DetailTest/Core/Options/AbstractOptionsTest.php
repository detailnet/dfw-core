<?php

namespace DetailTest\Core\Options;

use BadMethodCallException;

use PHPUnit\Framework\TestCase;

use Detail\Core\Options\AbstractOptions;

class AbstractOptionsTest extends TestCase
{
    /**
     * @var AbstractOptions
     */
    protected $options;

    protected function setUp()
    {
        $this->options = $this->getMockForAbstractClass(
            AbstractOptions::CLASS,
            array(),
            '',
            true,
            true,
            true,
            array('getKnown')
        );

        $this->options->expects($this->any())
            ->method('getKnown')
            ->will($this->returnValue('test'));
    }

    public function testKnownOptionCanBeAccessed()
    {
        $this->assertEquals('test', $this->options->known);
    }

    public function testSetUnknownOptionDoesNotThrowException()
    {
        $this->options->unknown = 'test';
    }

    public function testGetUnknownOptionThrowsException()
    {
        $this->expectException(BadMethodCallException::CLASS);

        $this->options->unknown;
    }
}
