<?php
/**
 * Представлення користувача, яке відповідає за відображення даних.
 */
class UserView
{
    /** @var string $name Ім'я користувача */
    public $name;

    /** @var int $age Вік користувача */
    public $age;

    /**
     * Конструктор класу UserView.
     *
     * @param string $name Ім'я користувача
     * @param int $age Вік користувача
     */
    function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    /**
     * Деструктор класу UserView, який виводить інформацію.
     */
    function __destruct()
    {
        echo "<br />";
        echo "Name: {$this->name}, age: {$this->age}";
    }
}

// Створення об'єкта представлення користувача
$user = new UserView("user", 20);
?>