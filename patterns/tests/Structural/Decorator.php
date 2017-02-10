<?php

require __DIR__  . "../../../src/structural/decorator.php";

class Decorator extends \PHPUnit_Framework_TestCase
{
    /**
    * Instantiate PHPDelete class
    */
    public function setUp()
    {
        $this->patternBook = new Book("Gamma, Helm, Johnson, and Vlissides", 'Design Patterns');
        $this->decorator = new BookTitleDecorator($this->patternBook);
        $this->starDecorator = new BookTitleStarDecorator($this->decorator);
        $this->exclaimDecorator = new BookTitleExclaimDecorator($this->decorator);
    }
    /**
     * @test
     *
     * @return void
     */
    public function decoratorTest()
    {
        $this->assertEquals($this->decorator->showTitle(), "Gamma, Helm, Johnson, and Vlissides");
        $this->exclaimDecorator->exclaimTitle();
        $this->assertEquals($this->decorator->showTitle(), "!Gamma, Helm, Johnson, and Vlissides!");
    }
}
