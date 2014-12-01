<?php

namespace DetailTest\Core\Options;

use PHPUnit_Framework_TestCase as TestCase;

class TypeAwareOptionsTraitTest extends TestCase
{
    /**
     * @var \Detail\Core\Options\TypeAwareOptionsTrait
     */
    protected $options;

    protected function setUp()
    {
        $this->options = $this->getMockForTrait(
            'Detail\Core\Options\TypeAwareOptionsTrait', array(), '', true, true, true, array('getKnown')
        );
    }

    public function testTypeCanBeSetAndAccessed()
    {
        $type = 'test';

        $this->options->setType($type);
        $this->assertEquals($type, $this->options->getType());
    }

    public function testOptionsCanBeSetAndAccessed()
    {
        $options = array('foo' => 'bar');

        $this->options->setOptions($options);
        $this->assertEquals($options, $this->options->getOptions());
    }
}
