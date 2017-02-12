<?php

require __DIR__  . "../../../src/behavioral/command.php";

class Command extends \PHPUnit_Framework_TestCase
{
    /**
    * Instantiate command class class
    */
    public function setUp()
    {
        $this->book = new BookCommandee('Design Patterns', 'Gamma, Helm, Johnson, and Vlissides');
    }
    /**
     *
     * @test
     *
     * @return void
     */
    public function commandTest()
    {
        function callCommand(BookCommand $bookCommand_in)
        {
            $bookCommand_in->execute();
        }
        $starsOn = new BookStarsOnCommand($this->book);
        callCommand($starsOn);
        $this->assertEquals($this->book->getTitle(), 'Design*Patterns');
 
        $starsOff = new BookStarsOffCommand($this->book);
        callCommand($starsOff);
        $this->assertEquals($this->book->getTitle(), 'Design Patterns');
    }
}
