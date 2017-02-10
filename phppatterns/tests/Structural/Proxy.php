<?php

require __DIR__  . "../../../src/structural/proxy.php";

class Proxy extends \PHPUnit_Framework_TestCase
{
    /**
    * Instantiate PHPDelete class
    */
    public function setUp()
    {
        $this->proxyBookList = new ProxyBookList();
        $this->inBook = new Book('PHP for Cats', 'Larry Truett');
    }
    /**
     * @test
     *
     * @return void
     */
    public function proxyTest()
    {
        $this->proxyBookList->addBook($this->inBook);
        $this->assertEquals($this->proxyBookList->getBookCount(), 1);

        $outBook = $this->proxyBookList->getBook(1);
        $this->proxyBookList->removeBook($outBook);
        $this->assertEquals($this->proxyBookList->getBookCount(), 0);
    }
}
