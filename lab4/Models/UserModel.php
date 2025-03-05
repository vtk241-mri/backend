<?php
class UserModel
{
    public $name;
    public $type;

    function set_info($name, $type)
    {
        $this->name = $name;
        $this->type = $type;
    }

    function get__name()
    {
        return $this->name;
    }
    function get__type()
    {
        return $this->type;
    }
}

$model = new UserModel();
$model->set_info("user1", "student");

echo "Name: " . $model->get__name();
echo "<br />";
echo "Type: " . $model->get__type();

?>