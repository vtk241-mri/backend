<?php
/**
 * Простір імен для моделей даних.
 */
namespace Models;
/**
 * Модель користувача для зберігання інформації про нього.
 */
class UserModel
{
    /** @var string $name Ім'я користувача */
    public $name;

    /** @var string $type Тип користувача (наприклад, студент, адміністратор) */
    public $type;

    /**
     * Встановлює інформацію про користувача.
     *
     * @param string $name Ім'я користувача
     * @param string $type Тип користувача
     */
    function set_info($name, $type)
    {
        $this->name = $name;
        $this->type = $type;
    }

    /**
     * Отримує ім'я користувача.
     *
     * @return string
     */
    function get__name()
    {
        return $this->name;
    }

    /**
     * Отримує тип користувача.
     *
     * @return string
     */
    function get__type()
    {
        return $this->type;
    }
}

// Створення об'єкта моделі користувача та встановлення даних
$model = new UserModel();
$model->set_info("user1", "student");

echo "Name: " . $model->get__name();
echo "<br />";
echo "Type: " . $model->get__type();
?>