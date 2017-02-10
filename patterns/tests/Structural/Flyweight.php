<?php

require __DIR__  . "../../../src/structural/flyweight.php";

class Facade extends \PHPUnit_Framework_TestCase
{
    /**
    * Instantiate PHPDelete class
    */
    public function setUp()
    {
        $this->flyweightFactory = new FlyweightFactory();
        $this->flyweightBookShelf1 =  new FlyweightBookShelf();
        $this->flyweightBook1 = $this->flyweightFactory->getBook(1);
        $this->flyweightBookShelf1->addBook($this->flyweightBook1);
        $this->flyweightBook2 = $this->flyweightFactory->getBook(1);
        $this->flyweightBookShelf1->addBook($this->flyweightBook2);

        $this->flyweightBookShelf2 =  new FlyweightBookShelf();
        $this->flyweightBook1 = $this->flyweightFactory->getBook(2);
        $this->flyweightBookShelf2->addBook($this->flyweightBook1);
        $this->flyweightBookShelf1->addBook($this->flyweightBook1);
    }
     /**
      * @test
      */
    public function flyweightTest()
    {
        $this->assertNotEquals($this->flyweightBook1, $this->flyweightBook2);
        $this->assertEquals($this->flyweightBook1, $this->flyweightBook1);

        echo($this->flyweightBookShelf1->showBooks());


  //writeln($flyweightBookShelf2->showBooks());
    }
}
