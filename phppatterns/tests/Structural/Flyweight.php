<?php

require __DIR__  . "../../../src/structural/flyweight.php";

class Flyweight extends \PHPUnit_Framework_TestCase
{
    /**
    * Instantiate PHPDelete class
    */
    public function setUp()
    {
        $this->flyweightFactory = new FlyweightFactory();
    }
    /**
     * @test
     *
     * @return void
     */
    public function flyweightTest()
    {
        //add/create one book
        $this->flyweightBook1 = $this->flyweightFactory->getBook(1);
        $this->assertEquals(count($this->flyweightFactory->getBooks()), 1);

        //try to add same book
        $this->flyweightBook1 = $this->flyweightFactory->getBook(1);
        $this->assertEquals(count($this->flyweightFactory->getBooks()), 1);

        $this->flyweightBook2 = $this->flyweightFactory->getBook(2);
        $this->assertEquals(count($this->flyweightFactory->getBooks()), 2);
    }
}
