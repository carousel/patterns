<?php

require __DIR__  . "../../../src/creational/singleton.php";

class Singleton extends \PHPUnit_Framework_TestCase
{
    /**
    * Instantiate factory method
    */
    public function setUp()
    {
        $this->bookBorrower1 = new BookBorrower();
        $this->bookBorrower2 = new BookBorrower();
    }
    /**
     * @test
     */
    public function singletonInstance()
    {
        $this->assertTrue($this->bookBorrower1 instanceof BookBorrower);
    }
    /**
     * @test
     */
    public function singletonInstancesAreEqueal()
    {
        $this->assertEquals($this->bookBorrower1,$this->bookBorrower2);
    }
}
