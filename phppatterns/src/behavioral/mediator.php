<?php

class BookMediator
{
    private $authorObject;
    private $titleObject;
    public function __construct($author_in, $title_in)
    {
        $this->authorObject = new BookAuthorColleague($author_in, $this);
        $this->titleObject  = new BookTitleColleague($title_in, $this);
    }
    public function getAuthor()
    {
        return $this->authorObject;
    }
    public function getTitle()
    {
        return $this->titleObject;
    }
    // when title or author change case, this makes sure the other
    // stays in sync
    public function change(BookColleague $changingClassIn)
    {
        if ($changingClassIn instanceof BookAuthorColleague) {
            if ('upper' == $changingClassIn->getState()) {
                if ('upper' != $this->getTitle()->getState()) {
                    $this->getTitle()->setTitleUpperCase();
                }
            } elseif ('lower' == $changingClassIn->getState()) {
                if ('lower' != $this->getTitle()->getState()) {
                    $this->getTitle()->setTitleLowerCase();
                }
            }
        } elseif ($changingClassIn instanceof BookTitleColleague) {
            if ('upper' == $changingClassIn->getState()) {
                if ('upper' != $this->getAuthor()->getState()) {
                    $this->getAuthor()->setAuthorUpperCase();
                }
            } elseif ('lower' == $changingClassIn->getState()) {
                if ('lower' != $this->getAuthor()->getState()) {
                    $this->getAuthor()->setAuthorLowerCase();
                }
            }
        }
    }
}

abstract class BookColleague
{
    private $mediator;
    public function __construct($mediator_in)
    {
        $this->mediator = $mediator_in;
    }
    public function getMediator()
    {
        return $this->mediator;
    }
    public function changed($changingClassIn)
    {
        getMediator()->titleChanged($changingClassIn);
    }
}

class BookAuthorColleague extends BookColleague
{
    private $author;
    private $state;
    public function __construct($author_in, $mediator_in)
    {
        $this->author = $author_in;
        parent::__construct($mediator_in);
    }
    public function getAuthor()
    {
        return $this->author;
    }
    public function setAuthor($author_in)
    {
        $this->author = $author_in;
    }
    public function getState()
    {
        return $this->state;
    }
    public function setState($state_in)
    {
        $this->state = $state_in;
    }
    public function setAuthorUpperCase()
    {
        $this->setAuthor(strtoupper($this->getAuthor()));
        $this->setState('upper');
        $this->getMediator()->change($this);
    }
    public function setAuthorLowerCase()
    {
        $this->setAuthor(strtolower($this->getAuthor()));
        $this->setState('lower');
        $this->getMediator()->change($this);
    }
}

class BookTitleColleague extends BookColleague
{
    private $title;
    private $state;
    public function __construct($title_in, $mediator_in)
    {
        $this->title = $title_in;
        parent::__construct($mediator_in);
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function setTitle($title_in)
    {
        $this->title = $title_in;
    }
    public function getState()
    {
        return $this->state;
    }
    public function setState($state_in)
    {
        $this->state = $state_in;
    }
    public function setTitleUpperCase()
    {
        $this->setTitle(strtoupper($this->getTitle()));
        $this->setState('upper');
        $this->getMediator()->change($this);
    }
    public function setTitleLowerCase()
    {
        $this->setTitle(strtolower($this->getTitle()));
        $this->setState('lower');
        $this->getMediator()->change($this);
    }
}
