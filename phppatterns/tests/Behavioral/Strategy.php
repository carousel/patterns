<?php

require __DIR__  . "../../../src/behavioral/strategy.php";

class Strategy extends \PHPUnit_Framework_TestCase
{
    /**
    * Instantiate strategy classes class
    */
    public function setUp()
    {
        $this->book = new Book('PHP for Cats', 'Larry Truett');
        $this->strategyContextC = new StrategyContext('C');
        $this->strategyContextE = new StrategyContext('E');
        $this->strategyContextS = new StrategyContext('S');
    }
    /**
     *
     * @test
     *
     * @return void
     */
    public function strategyTest()
    {
        $this->assertEquals($this->strategyContextC->showBookTitle($this->book),'PHP FOR CATS');
        $this->assertEquals($this->strategyContextE->showBookTitle($this->book),'PHP!for!Cats');
        $this->assertEquals($this->strategyContextS->showBookTitle($this->book),'PHP*for*Cats');
    }
}
