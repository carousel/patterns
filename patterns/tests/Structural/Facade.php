<?php

require __DIR__  . "../../../src/structural/facade.php";

class Facade extends \PHPUnit_Framework_TestCase
{
    /**
    * Instantiate PHPDelete class
    */
    public function setUp()
    {
        $this->book = new Book('Design Patterns', 'Gamma, Helm, Johnson, and Vlissides');
    }
    /**
     * @test
     *
     * @return void
     */
    public function facadeTest()
    {
        $bookTitleReversed = CaseReverseFacade::reverseStringCase($this->book->getTitle());
        $title = $this->book->getTitle();
        $this->assertEquals($this->book->getTitle(), $title);
        $this->assertEquals($bookTitleReversed, 'dESIGN pATTERNS');
    }
}
