<?php
/**
 * Контролер для управління користувачами.
 */
class UserController
{
    /** @var string $name Ім'я контролера */
    public $name;

    /**
     * Встановлює ім'я контролера.
     *
     * @param string $name Ім'я для контролера
     */
    function set_name($name)
    {
        $this->name = $name;
    }

    /**
     * Отримує ім'я контролера.
     *
     * @return string
     */
    function get__name()
    {
        return $this->name;
    }
}

// Створення об'єкта контролера та встановлення й отримання імені
$controller = new UserController();
$controller->set_name("This controller");

echo "<br />";
echo "Name: " . $controller->get__name();
?>