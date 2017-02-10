<?php

abstract class AbstractFactoryMethod
{
    abstract public function makePHPBook($param);
}

class OReillyFactoryMethod extends AbstractFactoryMethod
{
    private $context = "OReilly";
    public function makePHPBook($param)
    {
        $book = null;
        switch ($param) {
            case "us":
                $book = new OReillyPHPBook;
            break;
            case "other":
                $book = new SamsPHPBook;
            break;
            default:
                $book = new OReillyPHPBook;
            break;
        }
        return $book;
    }
}

class SamsFactoryMethod extends AbstractFactoryMethod
{
    private $context = "Sams";
    public function makePHPBook($param)
    {
        $book = null;
        switch ($param) {
            case "us":
                $book = new SamsPHPBook;
            break;
            case "other":
                $book = new OReillyPHPBook;
            break;
            case "otherother":
                $book = new VisualQuickstartPHPBook;
            break;
            default:
                $book = new SamsPHPBook;
            break;
        }
        return $book;
    }
}




abstract class AbstractPHPBook
{
    private $subject = "PHP";
}

class OReillyPHPBook extends AbstractPHPBook
{
    private $author;
    private $title;
    private static $oddOrEven = 'odd';
    public function __construct()
    {
        //alternate between 2 books
        if ('odd' == self::$oddOrEven) {
            $this->author = "Rasmus Lerdorf and Kevin Tatroe\n";
            $this->title  = "Programming PHP\n";
            self::$oddOrEven = "even\n";
        } else {
            $this->author = "David Sklar and Adam Trachtenberg\n";
            $this->title  = "PHP Cookbook\n";
            self::$oddOrEven = "odd\n";
        }
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

class SamsPHPBook extends AbstractPHPBook
{
    private $author;
    private $title;
    public function __construct()
    {
        //alternate randomly between 2 books
        mt_srand((double)microtime()*10000000);
        $rand_num = mt_rand(0, 1);

        if (1 > $rand_num) {
            $this->author = "George Schlossnagle\n";
            $this->title  = "Advanced PHP Programming\n";
        } else {
            $this->author = "Christian Wenz\n";
            $this->title  = "PHP Phrasebook\n";
        }
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
class VisualQuickstartPHPBook extends AbstractPHPBook
{
    private $author;
    private $title;
    public function __construct()
    {
        $this->author = 'Larry Ullman';
        $this->title  = 'PHP for the World Wide Web';
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
