<?php

namespace DetailTest\Core\Options;

use PHPUnit\Framework\TestCase;

use Detail\Core\Options\TypeAwareOptionsTrait;

class TypeAwareOptionsTraitTest extends TestCase
{
    /**
     * @var TypeAwareOptionsTrait
     */
    protected $options;

    protected function setUp()
    {
        $this->options = $this->getMockForTrait(TypeAwareOptionsTrait::CLASS);
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
