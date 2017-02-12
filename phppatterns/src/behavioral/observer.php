
<?php

abstract class AbstractObserver
{
    abstract public function update(AbstractSubject $subject_in);
}

abstract class AbstractSubject
{
    abstract public function attach(AbstractObserver $observer_in);
    abstract public function detach(AbstractObserver $observer_in);
    abstract public function notify();
}


class PatternObserver extends AbstractObserver
{
    public function __construct()
    {
    }
    public function update(AbstractSubject $subject)
    {
        $subject->getFavorites();
    }
}

class PatternSubject extends AbstractSubject
{
    private $favoritePatterns = null;
    private $observers = array();
    public function __construct()
    {
    }
    public function attach(AbstractObserver $observer_in)
    {
        //could also use array_push($this->observers, $observer_in);
      $this->observers[] = $observer_in;
    }
    public function detach(AbstractObserver $observer_in)
    {
        //$key = array_search($observer_in, $this->observers);
      foreach ($this->observers as $okey => $oval) {
          if ($oval == $observer_in) {
              unset($this->observers[$okey]);
          }
      }
    }
    public function notify()
    {
        foreach ($this->observers as $obs) {
            $obs->update($this);
        }
    }
    public function updateFavorites($newFavorites)
    {
        $this->favorites = $newFavorites;
        $this->notify();
    }
    public function getFavorites()
    {
        return $this->favorites;
    }
}
