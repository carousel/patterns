<?php

class BookContext
{
    private $book = null;
    private $bookTitleState = null;
    //bookList is not instantiated at construct time
    public function __construct($book_in)
    {
        $this->book = $book_in;
        $this->setTitleState(new BookTitleStateStars());
    }
    public function getBookTitle()
    {
        return $this->bookTitleState->showTitle($this);
    }
    public function getBook()
    {
        return $this->book;
    }
    public function setTitleState($titleState_in)
    {
        $this->bookTitleState = $titleState_in;
    }
}

interface BookTitleStateInterface
{
    public function showTitle($context_in);
}
 
class BookTitleStateExclaim implements BookTitleStateInterface
{
    private $titleCount = 0;
    public function showTitle($context_in)
    {
        $title = $context_in->getBook()->getTitle();
        $this->titleCount++;
        $context_in->setTitleState(new BookTitleStateStars());
        return Str_replace(' ', '!', $title);
    }
}

class BookTitleStateStars implements BookTitleStateInterface
{
    private $titleCount = 0;
    public function showTitle($context_in)
    {
        $title = $context_in->getBook()->getTitle();
        $this->titleCount++;
        if (1 < $this->titleCount) {
            $context_in->setTitleState(new BookTitleStateExclaim);
        }
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

 
  $book = new Book('PHP for Cats', 'Larry Truett');;
  $context = new BookContext($book);
  $book = new Book('PHP for Cats','Larry Truett');;
  $context = new bookContext($book);
 
  echo('test 1 - show name ');
  echo($context->getBookTitle()) . "\n";

  echo('test 2 - show name ');
  echo($context->getBookTitle()) . "\n";
 
  echo('test 3 - show name ');
  echo($context->getBookTitle()) . "\n";
 
  echo('test 4 - show name ');
  echo($context->getBookTitle());

 

?>
