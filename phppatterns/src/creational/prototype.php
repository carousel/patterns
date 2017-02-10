<?php
class SubObject
{
    public static $instances = 0;
    public $instance;
    public function __construct()
    {
        $this->instance = ++self::$instances;
    }
    public function __clone()
    {
        $this->instance = ++self::$instances;
    }
}

class MyCloneable
{
    public $object1;
    public $object2;
    public function __clone()
    {
        // Force a copy of this->object, otherwise it will point to same object.
        $this->object1 = clone $this->object1;
    }
}


//$obj2 = clone $obj;

//echo "Original Object:\n";
//foreach ($obj as $o) {
    //print_r($o);
//}

//echo "Cloned Object:\n";
//foreach ($obj2 as $o) {
    //print_r($o);
//}
