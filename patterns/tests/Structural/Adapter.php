<?php

require __DIR__  . "../../../src/structural/adapter.php";

class Adapter extends \PHPUnit_Framework_TestCase
{
    /**
    * Instantiate PHPDelete class
    */
    public function setUp()
    {
        $this->book = new SimpleBook("Gamma, Helm, Johnson, and Vlissides", "Design Patterns");
        $this->bookAdapter = new BookAdapter($this->book);
    }
    /**
     * @test
     *
     * @return void
     */
    public function adapterTest()
    {
        $result = $this->bookAdapter->getAuthorAndTitle();
        $this->assertEquals($this->book->getTitle() . " by ". $this->book->getAuthor(),$result);
    }
}

