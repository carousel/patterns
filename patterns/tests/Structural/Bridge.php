<?php

require __DIR__  . "../../../src/structural/bridge.php";

class Bridge extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     *
     * @return void
     */
    public function bridgeTest()
    {
        //first implementation with same interface
        $book = new BridgeBookAuthorTitle('Larry Truett', "PHP for Cats", 'CAPS');
        $this->assertEquals($book->showAuthorTitle(), "LARRY TRUETT's PHP FOR CATS");

        //second implementation with same interface
        $book = new BridgeBookTitleAuthor('Larry Truett', "PHP for Cats", 'STARS');
        $this->assertEquals($book->showTitleAuthor(), "PHP*for*Cats by Larry*Truett");
    }
}
