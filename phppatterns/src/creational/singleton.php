<?php

/*
 *   Singleton classes
 */
class BookSingleton
{
    private $author = "Gamma, Helm, Johnson, and Vlissides\n";
    private $title  = "Design Patterns";
    private static $book = null;
    private static $isLoanedOut = false;

    private function __construct()
    {
    }

    public static function borrowBook()
    {
        if (false == self::$isLoanedOut) {
            if (null == self::$book) {
                self::$book = new BookSingleton();
            }
            self::$isLoanedOut = true;
            return self::$book;
        } else {
            return null;
        }
    }

    public function returnBook(BookSingleton $bookReturned)
    {
        self::$isLoanedOut = false;
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
 
class BookBorrower
{
    private $borrowedBook;
    private $haveBook = false;

    public function __construct()
    {
    }

    public function getAuthorAndTitle()
    {
        if (true == $this->haveBook) {
            return $this->borrowedBook->getAuthorAndTitle();
        } else {
            return "I don't have the book\n";
        }
    }

    public function borrowBook()
    {
        $this->borrowedBook = BookSingleton::borrowBook();
        if ($this->borrowedBook == null) {
            $this->haveBook = false;
        } else {
            $this->haveBook = true;
        }
    }

    public function returnBook()
    {
        $this->borrowedBook->returnBook($this->borrowedBook);
    }
}
