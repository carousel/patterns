<?php

class SimpleBook
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

class BookAdapter
{
    private $book;
    public function __construct(SimpleBook $book_in)
    {
        $this->book = $book_in;
    }
    public function getAuthorAndTitle()
    {
        return $this->book->getTitle().' by '.$this->book->getAuthor();
    }
}

  // client


  $book = new SimpleBook("Gamma, Helm, Johnson, and Vlissides", "Design Patterns");
  $bookAdapter = new BookAdapter($book);
  writeln("Author and Title:".$bookAdapter->getAuthorAndTitle());
  writeln('');


  function writeln($line_in)
  {
      echo $line_in . "\n";
  }
