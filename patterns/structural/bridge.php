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

 
  writeln("Test 1 - author title with caps:\n");
  $book = new BridgeBookAuthorTitle('Larry Truett', "PHP for Cats\n", 'CAPS');
  writeln($book->showAuthorTitle());

  writeln("Test 2 - author title with stars:\n");
  $book = new BridgeBookAuthorTitle('Larry Truett', "PHP for Cats\n", 'STARS');
  writeln($book->showAuthorTitle());
  writeln('');

  writeln("test 3 - title author with caps\n");
  $book = new BridgeBookTitleAuthor('Larry Truett', "PHP for Cats\n", 'CAPS');
  writeln($book->showTitleAuthor());
  writeln('');

  writeln("test 4 - title author with stars\n");
  $book = new BridgeBookTitleAuthor('Larry Truett', "PHP for Cats\n", 'STARS');
  writeln($book->showTitleAuthor());


  function writeln($line_in)
  {
      echo $line_in;
  }
