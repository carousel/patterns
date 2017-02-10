<?php

class BookCommandee
{
    private $author;
    private $title;
    public function __construct($title_in, $author_in)
    {
        $this->setAuthor($author_in);
        $this->setTitle($title_in);
    }
    public function getAuthor()
    {
        return $this->author;
    }
    public function setAuthor($author_in)
    {
        $this->author = $author_in;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function setTitle($title_in)
    {
        $this->title = $title_in;
    }
    public function setStarsOn()
    {
        $this->setAuthor(Str_replace(' ', '*', $this->getAuthor()));
        $this->setTitle(Str_replace(' ', '*', $this->getTitle()));
    }
    public function setStarsOff()
    {
        $this->setAuthor(Str_replace('*', ' ', $this->getAuthor()));
        $this->setTitle(Str_replace('*', ' ', $this->getTitle()));
    }
    public function getAuthorAndTitle()
    {
        return $this->getTitle().' by '.$this->getAuthor();
    }
}

abstract class BookCommand
{
    protected $bookCommandee;
    public function __construct($bookCommandee_in)
    {
        $this->bookCommandee = $bookCommandee_in;
    }
    abstract public function execute();
}

class BookStarsOnCommand extends BookCommand
{
    public function execute()
    {
        $this->bookCommandee->setStarsOn();
    }
}

class BookStarsOffCommand extends BookCommand
{
    public function execute()
    {
        $this->bookCommandee->setStarsOff();
    }
}
