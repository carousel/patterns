<?php

require __DIR__  . "../../../src/behavioral/mediator.php";

class Mediator extends \PHPUnit_Framework_TestCase
{
    /**
    * Instantiate command class class
    */
    public function setUp()
    {
        $this->mediator = new BookMediator('Gamma, Helm, Johnson, and Vlissides', 'Design Patterns');
    }
    /**
     *
     * @test
     *
     * @return void
     */
    public function mediatorTest()
    {
        $author = $this->mediator->getAuthor();
        $title = $this->mediator->getTitle();
        $this->assertEquals($author->getAuthor(), 'Gamma, Helm, Johnson, and Vlissides');
        $this->assertEquals($title->getTitle(), 'Design Patterns');

        $author->setAuthorLowerCase();
        $this->assertEquals($author->getAuthor(), 'gamma, helm, johnson, and vlissides');

        $title->setTitleLowerCase();
        $this->assertEquals($title->getTitle(), 'design patterns');
    }
}
