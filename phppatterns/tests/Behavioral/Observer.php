<?php

require __DIR__  . "../../../src/behavioral/observer.php";

class Obserser extends \PHPUnit_Framework_TestCase
{
    /**
    * Instantiate obserser class class
    */
    public function setUp()
    {
        $this->patternGossiper = new PatternSubject();
        $this->patternGossipFan = new PatternObserver();
    }
    /**
     *
     * @test
     *
     * @return void
     */
    public function obserserTest()
    {
        $this->patternGossiper->attach($this->patternGossipFan);

        $this->patternGossiper->updateFavorites('abstract factory, decorator, visitor');
        $this->assertEquals($this->patternGossiper->getFavorites(), 'abstract factory, decorator, visitor');

        $this->patternGossiper->updateFavorites('abstract factory, observer, decorator');
        $this->assertEquals($this->patternGossiper->getFavorites(), 'abstract factory, observer, decorator');

        $this->patternGossiper->detach($this->patternGossipFan);
        $this->patternGossiper->updateFavorites('abstract factory, observer, paisley');
        $this->assertEquals($this->patternGossiper->getFavorites(), 'abstract factory, observer, paisley');
    }
}
