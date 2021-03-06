<?php

namespace NFePHPTest\Console\XsdConverter\Naming;

use Goetas\XML\XSDReader\Schema\Item;
use Goetas\XML\XSDReader\Schema\Schema;
use Goetas\XML\XSDReader\Schema\Type\Type;
use Goetas\Xsd\XsdToPhp\Naming\NamingStrategy;
use NFePHP\Console\XsdConverter\Naming\SpedStrategy;

class SpedStrategyTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldCreateInstance()
    {
        $strategy = new SpedStrategy();
        $this->assertInstanceOf(NamingStrategy::class, $strategy);
    }

    public function testShouldGetTypeName()
    {
        $strategy = new SpedStrategy();

        $schema = $this->getMockForAbstractClass(Schema::class);
        $type = $this->getMockForAbstractClass(Type::class, [$schema, 'test']);

        $this->assertEquals('TestType', $strategy->getTypeName($type));
    }

    public function testShouldGetAnonymousTypeName()
    {
        $strategy = new SpedStrategy();

        $schema = $this->getMockForAbstractClass(Schema::class);
        $type = $this->getMockForAbstractClass(Type::class, [$schema, 'test']);

        $this->assertEquals('ParentType', $strategy->getAnonymousTypeName($type, 'parent'));
    }

    public function testShouldGetItemName()
    {
        $strategy = new SpedStrategy();

        $schema = $this->getMockForAbstractClass(Schema::class);
        $type = $this->getMockForAbstractClass(Item::class, [$schema, 'test']);

        $this->assertEquals('Test', $strategy->getItemName($type));
    }

    public function testShouldGetPropertyName()
    {
        $strategy = new SpedStrategy();

        $schema = $this->getMockForAbstractClass(Schema::class);
        $type = $this->getMockForAbstractClass(Item::class, [$schema, 'test.property']);

        $this->assertEquals('testProperty', $strategy->getPropertyName($type));
    }
}
