<?php
class UserView
{
    public $name;
    public $age;

    function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }
    function __destruct()
    {
        echo "<br />";
        echo "Name: {$this->name}, age: {$this->age}";
    }
}

$user = new UserView("user", 20);
