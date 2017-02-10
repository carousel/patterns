<?php

abstract class OnTheBookShelf
{
    abstract public function getBookInfo($previousBook);
    abstract public function getBookCount();
    abstract public function setBookCount($new_count);
    abstract public function addBook($oneBook);
    abstract public function removeBook($oneBook);
}

class OneBook extends OnTheBookShelf
{
    private $title;
    private $author;
    public function __construct($title, $author)
    {
        $this->title = $title;
        $this->author = $author;
    }
    public function getBookInfo($bookToGet)
    {
        if (1 == $bookToGet) {
            return $this->title." by ".$this->author;
        } else {
            return false;
        }
    }
    public function getBookCount()
    {
        return 1;
    }
    public function setBookCount($newCount)
    {
        return false;
    }
    public function addBook($oneBook)
    {
        return false;
    }
    public function removeBook($oneBook)
    {
        return false;
    }
}

class SeveralBooks extends OnTheBookShelf
{
    private $oneBooks = array();
    private $bookCount;
    public function __construct()
    {
        $this->setBookCount(0);
    }
    public function getBookCount()
    {
        return $this->bookCount;
    }
    public function setBookCount($newCount)
    {
        $this->bookCount = $newCount;
    }
    public function getBookInfo($bookToGet)
    {
        if ($bookToGet <= $this->bookCount) {
            return $this->oneBooks[$bookToGet]->getBookInfo(1);
        } else {
            return false;
        }
    }
    public function addBook($oneBook)
    {
        $this->setBookCount($this->getBookCount() + 1);
        $this->oneBooks[$this->getBookCount()] = $oneBook;
        return $this->getBookCount();
    }
    public function removeBook($oneBook)
    {
        $counter = 0;
        while (++$counter <= $this->getBookCount()) {
            if ($oneBook->getBookInfo(1) ==
          $this->oneBooks[$counter]->getBookInfo(1)) {
                for ($x = $counter; $x < $this->getBookCount(); $x++) {
                    $this->oneBooks[$x] = $this->oneBooks[$x + 1];
                }
                $this->setBookCount($this->getBookCount() - 1);
            }
        }
        return $this->getBookCount();
    }
}
