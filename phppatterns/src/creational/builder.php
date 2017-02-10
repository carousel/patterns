<?php

abstract class AbstractPageBuilder
{
    abstract public function getPage();
}

abstract class AbstractPageDirector
{
    abstract public function __construct(AbstractPageBuilder $builder_in);
    abstract public function buildPage();
    abstract public function getPage();
}

class HTMLPage
{
    private $page = null;
    private $page_title = null;
    private $page_heading = null;
    private $page_text = null;
    public function __construct()
    {
    }
    public function showPage()
    {
        return $this->page;
    }
    public function setTitle($title_in)
    {
        $this->page_title = $title_in;
    }
    public function setHeading($heading_in)
    {
        $this->page_heading = $heading_in;
    }
    public function setText($text_in)
    {
        $this->page_text .= $text_in;
    }
    public function formatPage()
    {
        $this->page  = "<html>\n";
        $this->page .= "<head>\n\t<title>\n\t\t".$this->page_title."\n\t</title>\n</head>\n";
        $this->page .="<body>\n";
        $this->page .= "\t<h1>\n\t\t".$this->page_heading."\n\t</h1>\n";
        $this->page .= "\t\t".$this->page_text;
        $this->page .= "\n\t</body>\n";
        $this->page .= '</html>';
    }
}

class HTMLPageBuilder extends AbstractPageBuilder
{
    private $page = null;
    public function __construct()
    {
        $this->page = new HTMLPage();
    }
    public function setTitle($title_in)
    {
        $this->page->setTitle($title_in);
    }
    public function setHeading($heading_in)
    {
        $this->page->setHeading($heading_in);
    }
    public function setText($text_in)
    {
        $this->page->setText($text_in);
    }
    public function formatPage()
    {
        $this->page->formatPage();
    }
    public function getPage()
    {
        return $this->page;
    }
}

class HTMLPageDirector extends AbstractPageDirector
{
    private $builder = null;
    public function __construct(AbstractPageBuilder $builder_in)
    {
        $this->builder = $builder_in;
    }
    public function buildPage()
    {
        $this->builder->setTitle('Testing the HTMLPage');
        $this->builder->setHeading('Testing the HTMLPage');
        $this->builder->setText('Testing, testing, testing!');
        $this->builder->setText('Testing, testing, testing, or!');
        $this->builder->setText('Testing, testing, testing, more!');
        $this->builder->formatPage();
    }
    public function getPage()
    {
        return $this->builder->getPage();
    }
}
