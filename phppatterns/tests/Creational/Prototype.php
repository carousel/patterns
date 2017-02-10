<?php

require __DIR__  . "../../../src/creational/prototype.php";

class Prototype extends \PHPUnit_Framework_TestCase
{
    /**
    * Instantiate factory method
    */
    public function setUp()
    {
        $this->obj = new MyCloneable();

        $this->obj->object1 = new SubObject();
        $this->obj->object2 = new SubObject();
    }
    /**
     * @test
     */
    public function prototypeInstance()
    {
        $this->assertTrue($this->obj instanceof MyCloneable);
    }
    /**
     * @test
     */
    public function prototypeInstancesAreEqueal()
    {
        $this->assertEquals($this->obj->object2,$this->obj->object2);
    }
}
