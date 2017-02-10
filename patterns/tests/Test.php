<?php


class CreationalTests extends \PHPUnit_Framework_TestCase
{
    /**
    * Instantiate PHPDelete class
    */
    public function setUp()
    {
    }
    /**
     * @test
     *
     * Check do we have correct instances?
     */
    public function testAbstractFactory()
    {
        $orielly = new OReillyBookFactory;
        $sams = new SamsBookFactory;
        $assertTrue($orielly instanceof OReillyBookFactory);
        $assertTrue($sams instanceof SamsBookFactory);
    }
    /**
     * @test
     *
     * Check do we have correct instances?
     */
    public function testFactoryMethod()
    {
        $factoryMethod = new OReillyFactoryMethod;
        //$this->assertTrue($this->orielly instanceof OReillyBookFactory);
        //$this->assertTrue($this->sams instanceof SamsBookFactory);
    }
}
