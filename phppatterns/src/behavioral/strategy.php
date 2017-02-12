<?php

class StrategyContext
{
    private $strategy = null;
    //bookList is not instantiated at construct time
    public function __construct($strategy_ind_id)
    {
        switch ($strategy_ind_id) {
            case "C":
                $this->strategy = new StrategyCaps();
            break;
            case "E":
                $this->strategy = new StrategyExclaim();
            break;
            case "S":
                $this->strategy = new StrategyStars();
            break;
        }
    }
    public function showBookTitle($book)
    {
        return $this->strategy->showTitle($book);
    }
}

interface StrategyInterface
{
    public function showTitle($book_in);
}
 
class StrategyCaps implements StrategyInterface
{
    public $titleCount;
    public function showTitle($book_in)
    {
        $title = $book_in->getTitle();
        $this->titleCount++;
        return strtoupper($title);
    }
}

class StrategyExclaim implements StrategyInterface
{
    public $titleCount;
    public function showTitle($book_in)
    {
        $title = $book_in->getTitle();
        $this->titleCount++;
        return Str_replace(' ', '!', $title);
    }
}

class StrategyStars implements StrategyInterface
{
    public $titleCount;
    public function showTitle($book_in)
    {
        $title = $book_in->getTitle();
        $this->titleCount++;
        return Str_replace(' ', '*', $title);
    }
}

class Book
{
    private $author;
    private $title;
    public function __construct($title_in, $author_in)
    {
        $this->author = $author_in;
        $this->title  = $title_in;
    }
    public function getAuthor()
    {
        return $this->author;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getAuthorAndTitle()
    {
        return $this->getTitle() . ' by ' . $this->getAuthor();
    }
}
