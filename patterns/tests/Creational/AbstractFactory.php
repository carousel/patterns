<?php

require __DIR__  . "../../../src/creational/abstract_factory.php";

class AbstractFactory extends \PHPUnit_Framework_TestCase
{
    /**
    * Instantiate PHPDelete class
    */
    public function setUp()
    {
        $this->orielly = new OReillyBookFactory;
        $this->sams = new SamsBookFactory;
    }
    /**
     * Check do we have correct instances?
     *
     * @test
     */
    public function abstractFactoryInstance()
    {
        $this->assertTrue($this->orielly instanceof OReillyBookFactory);
        $this->assertTrue($this->sams instanceof SamsBookFactory);
    }
    /**
     * @test
     *
     * Check do we have correct instances?
     */
    //public function testFactoryMethod()
    //{
        //$factoryMethod = new OReillyFactoryMethod;
        //$this->assertTrue($this->orielly instanceof OReillyBookFactory);
        //$this->assertTrue($this->sams instanceof SamsBookFactory);
    //}
}
