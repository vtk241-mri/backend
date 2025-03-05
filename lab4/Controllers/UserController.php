<?php
class UserController
{
    public $name;

    function set_name($name)
    {
        $this->name = $name;
    }

    function get__name()
    {
        return $this->name;
    }
}

$controller = new UserController();
$controller->set_name("This controller");
echo "<br />";
echo "Name: " . $controller->get__name();