<?php

require __DIR__  . "../../../src/creational/factory_method.php";

class FactoryMethod extends \PHPUnit_Framework_TestCase
{
    /**
    * Instantiate factory method
    */
    public function setUp()
    {
        $this->factoryMethod = new OReillyFactoryMethod;
    }
    /**
     * @test
     */
    public function factoryMethodInstance()
    {
        $this->assertTrue($this->factoryMethod instanceof OReillyFactoryMethod);
    }
}
