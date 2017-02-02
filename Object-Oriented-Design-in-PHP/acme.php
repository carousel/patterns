<?php
trait Factory {
    public function hello()
    {
        echo 'trait';
    }
};
class Seller {
    public function hello()
    {
        echo 'seller';
    }
};
class Car extends Seller{ 
    use Factory;
}
(new Car)->hello();

