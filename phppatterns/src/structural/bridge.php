<?php

abstract class BridgeBook
{
    private $bbAuthor;
    private $bbTitle;
    private $bbImp;
    public function __construct($author_in, $title_in, $choice_in)
    {
        $this->bbAuthor = $author_in;
        $this->bbTitle  = $title_in;
        if ('STARS' == $choice_in) {
            $this->bbImp = new BridgeBookStarsImp();
        } else {
            $this->bbImp = new BridgeBookCapsImp();
        }
    }
    public function showAuthor()
    {
        return $this->bbImp->showAuthor($this->bbAuthor);
    }
    public function showTitle()
    {
        return $this->bbImp->showTitle($this->bbTitle);
    }
}
 
class BridgeBookAuthorTitle extends BridgeBook
{
    public function showAuthorTitle()
    {
        return $this->showAuthor() . "'s " . $this->showTitle();
    }
}
 
class BridgeBookTitleAuthor extends BridgeBook
{
    public function showTitleAuthor()
    {
        return $this->showTitle() . ' by ' . $this->showAuthor();
    }
}
 
abstract class BridgeBookImp
{
    abstract public function showAuthor($author);
    abstract public function showTitle($title);
}

class BridgeBookCapsImp extends BridgeBookImp
{
    public function showAuthor($author_in)
    {
        return strtoupper($author_in);
    }
    public function showTitle($title_in)
    {
        return strtoupper($title_in);
    }
}

class BridgeBookStarsImp extends BridgeBookImp
{
    public function showAuthor($author_in)
    {
        return Str_replace(" ", "*", $author_in);
    }
    public function showTitle($title_in)
    {
        return Str_replace(" ", "*", $title_in);
    }
}
