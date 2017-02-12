<?php

class FlyweightBook
{
    private $author;
    private $title;
    public function __construct($author_in, $title_in)
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
}
 
class FlyweightFactory
{
    private $books = array();
    public function __construct()
    {
        $this->books[1] = null;
        $this->books[2] = null;
        $this->books[3] = null;
    }
    public function getBook($bookKey)
    {
        if (!$this->books[$bookKey]) {
            $makeFunction = 'makeBook'.$bookKey;
            $this->books[$bookKey] = $this->$makeFunction();
        }
        return $this->books[$bookKey];
    }
    //Sort of an long way to do this, but hopefully easy to follow.
    //How you really want to make flyweights would depend on what
    //your application needs.  This, while a little clumbsy looking,
    //does work well.
    public function makeBook1()
    {
        $book = new FlyweightBook('Larry Truett', 'PHP For Cats');
        return $book;
    }
    public function makeBook2()
    {
        $book = new FlyweightBook('Larry Truett', 'PHP For Dogs');
        return $book;
    }
    public function makeBook3()
    {
        $book = new FlyweightBook('Larry Truett', 'PHP For Parakeets');
        return $book;
    }
    public function getBooksCount()
    {
        return count($this->books);
    }
    public function getBooks()
    {
        $filtered = [];
        foreach ($this->books as $book) {
            if ($book != null) {
                $filtered[] = $book;
            }
        }
        return $filtered;
    }
}
