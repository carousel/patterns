<?php

class ProxyBookList
{
    private $bookList = null;
    //bookList is not instantiated at construct time
    public function __construct()
    {
    }
    public function getBookCount()
    {
        if (null == $this->bookList) {
            $this->makeBookList();
        }
        return $this->bookList->getBookCount();
    }
    public function addBook($book)
    {
        if (null == $this->bookList) {
            $this->makeBookList();
        }
        return $this->bookList->addBook($book);
    }
    public function getBook($bookNum)
    {
        if (null == $this->bookList) {
            $this->makeBookList();
        }
        return $this->bookList->getBook($bookNum);
    }
    public function removeBook($book)
    {
        if (null == $this->bookList) {
            $this->makeBookList();
        }
        return $this->bookList->removeBook($book);
    }
    //Create
    public function makeBookList()
    {
        $this->bookList = new bookList();
    }
}

class BookList
{
    private $books = array();
    private $bookCount = 0;
    public function __construct()
    {
    }
    public function getBookCount()
    {
        return $this->bookCount;
    }
    private function setBookCount($newCount)
    {
        $this->bookCount = $newCount;
    }
    public function getBook($bookNumberToGet)
    {
        if ((is_numeric($bookNumberToGet)) && ($bookNumberToGet <= $this->getBookCount())) {
            return $this->books[$bookNumberToGet];
        } else {
            return null;
        }
    }
    public function addBook(Book $book_in)
    {
        $this->setBookCount($this->getBookCount() + 1);
        $this->books[$this->getBookCount()] = $book_in;
        return $this->getBookCount();
    }
    public function removeBook(Book $book_in)
    {
        $counter = 0;
        while (++$counter <= $this->getBookCount()) {
            if ($book_in->getAuthorAndTitle() == $this->books[$counter]->getAuthorAndTitle()) {
                for ($x = $counter; $x < $this->getBookCount(); $x++) {
                    $this->books[$x] = $this->books[$x + 1];
                }
                $this->setBookCount($this->getBookCount() - 1);
            }
        }
        return $this->getBookCount();
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
        return $this->getTitle().' by '.$this->getAuthor();
    }
}

 
  //$proxyBookList = new ProxyBookList();
  //$inBook = new Book('PHP for Cats', 'Larry Truett');
  //$proxyBookList->addBook($inBook);
 
  //writeln('test 1 - show the book count after a book is added');
  //writeln($proxyBookList->getBookCount());
  //writeln('');
 
  //writeln('test 2 - show the book');
  //$outBook = $proxyBookList->getBook(1);
  //writeln($outBook->getAuthorAndTitle());
  //writeln('');
 
  //$proxyBookList->removeBook($outBook);
 
  //writeln('test 3 - show the book count after a book is removed');
  //writeln($proxyBookList->getBookCount());
  //writeln('');


  //function writeln($line_in)
  //{
      //echo $line_in."\n";
  //}
