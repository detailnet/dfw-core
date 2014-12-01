<?php

namespace DetailTest\Core\Options;

use PHPUnit_Framework_TestCase as TestCase;

class AbstractOptionsTest extends TestCase
{
    /**
     * @var \Detail\Core\Options\AbstractOptions
     */
    protected $options;

    protected function setUp()
    {
        $this->options = $this->getMockForAbstractClass(
            'Detail\Core\Options\AbstractOptions',
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
        $this->setExpectedException('BadMethodCallException');

        $this->options->unknown;
    }
}
