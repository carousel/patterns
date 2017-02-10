<?php

require __DIR__  . "../../../src/creational/builder.php";

class Builder extends \PHPUnit_Framework_TestCase
{
    /**
    * Instantiate factory method
    */
    public function setUp()
    {
        $this->pageBuilder = new HTMLPageBuilder();
        $this->pageDirector = new HTMLPageDirector($this->pageBuilder);
    }
    /**
     * @test
     */
    public function pageBuilderInstance()
    {
        $this->assertTrue($this->pageBuilder instanceof HTMLPageBuilder);
    }
    /**
    * @test
    */
    public function buldTest()
    {
        $this->pageDirector->buildPage();
        $page = $this->pageDirector->GetPage();
        echo $page->showPage();
    }
}
