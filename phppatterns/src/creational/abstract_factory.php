<?php

abstract class AbstractBookFactory
{/*{{{*/
    abstract public function makePHPBook();
    abstract public function makeMySQLBook();
}/*}}}*/

class OReillyBookFactory extends AbstractBookFactory
{/*{{{*/
    private $context = "OReilly";
    public function makeMySQLBook()
    {
        return new OReillyMySQLBook;
    }
    public function makePHPBook()
    {
        return new OReillyPHPBook;
    }
}/*}}}*/

class SamsBookFactory extends AbstractBookFactory
{/*{{{*/
    private $context = "Sams";
    public function makeMySQLBook()
    {
        return new SamsMySQLBook;
    }
    public function makePHPBook()
    {
        return new SamsPHPBook;
    }
}/*}}}*/



abstract class AbstractMySQLBook
{/*{{{*/
    private $subject = "MySQL";
}/*}}}*/

class OReillyMySQLBook extends AbstractMySQLBook
{/*{{{*/
    private $author;
    private $title;
    public function __construct()
    {
        $this->author = 'George Reese, Randy Jay Yarger, and Tim King';
        $this->title = 'Managing and Using MySQL';
    }
    public function getAuthor()
    {
        return $this->author;
    }
    public function getTitle()
    {
        return $this->title;
    }
}/*}}}*/

class SamsMySQLBook extends AbstractMySQLBook
{/*{{{*/
    private $author;
    private $title;
    public function __construct()
    {
        $this->author = 'Paul Dubois';
        $this->title = 'MySQL, 3rd Edition';
    }
    public function getAuthor()
    {
        return $this->author;
    }
    public function getTitle()
    {
        return $this->title;
    }
}/*}}}*/



abstract class AbstractPHPBook
{/*{{{*/
    private $subject = "PHP";
}/*}}}*/

class OReillyPHPBook extends AbstractPHPBook
{/*{{{*/
    private $author;
    private $title;
    private static $oddOrEven = 'odd';
    public function __construct()
    {
        //alternate between 2 books
        if ('odd' == self::$oddOrEven) {
            $this->author = 'Rasmus Lerdorf and Kevin Tatroe';
            $this->title = 'Programming PHP';
            self::$oddOrEven = 'even';
        } else {
            $this->author = 'David Sklar and Adam Trachtenberg';
            $this->title = 'PHP Cookbook';
            self::$oddOrEven = 'odd';
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
}/*}}}*/

class SamsPHPBook extends AbstractPHPBook
{/*{{{*/
    private $author;
    private $title;
    public function __construct()
    {
        //alternate randomly between 2 books
        mt_srand((double)microtime() * 10000000);
        $rand_num = mt_rand(0, 1);

        if (1 > $rand_num) {
            $this->author = 'George Schlossnagle';
            $this->title = 'Advanced PHP Programming';
        } else {
            $this->author = 'Christian Wenz';
            $this->title = 'PHP Phrasebook';
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
}/*}}}*/
