<?php
namespace Classes;
/**
 * Абстрактний клас Human
 */
abstract class Human
{
    protected $height;
    protected $weight;
    protected $age;

    /**
     * Конструктор класу Human.
     *
     * @param int $height Зріст (см)
     * @param int $weight Вага (кг)
     * @param int $age Вік (років)
     */
    public function __construct($height, $weight, $age)
    {
        $this->height = $height;
        $this->weight = $weight;
        $this->age = $age;
    }

    // Методи GET і SET
    public function getHeight()
    {
        return $this->height;
    }
    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function getWeight()
    {
        return $this->weight;
    }
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    public function getAge()
    {
        return $this->age;
    }
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * Метод "Народження дитини"
     */
    public function birthChild()
    {
        echo "Народилася дитина!<br>";
        $this->birthMessage();
    }

    /**
     * Абстрактний метод "Повідомлення при народженні дитини".
     * Кожен дочірній клас повинен реалізувати цей метод.
     */
    abstract protected function birthMessage();
}

/**
 * Клас Student, що успадковує Human
 */
class Student extends Human
{
    private $university;
    private $course;

    public function __construct($height, $weight, $age, $university, $course)
    {
        parent::__construct($height, $weight, $age);
        $this->university = $university;
        $this->course = $course;
    }

    public function getUniversity()
    {
        return $this->university;
    }
    public function setUniversity($university)
    {
        $this->university = $university;
    }

    public function getCourse()
    {
        return $this->course;
    }
    public function setCourse($course)
    {
        $this->course = $course;
    }

    public function promoteToNextCourse()
    {
        $this->course++;
    }

    /**
     * Реалізація абстрактного методу "Повідомлення при народженні дитини" для студента
     */
    protected function birthMessage()
    {
        echo "Вітаємо нового студента!<br>";
    }
}

/**
 * Клас Programmer, що успадковує Human
 */
class Programmer extends Human
{
    private $languages = [];
    private $experience;

    public function __construct($height, $weight, $age, $languages, $experience)
    {
        parent::__construct($height, $weight, $age);
        $this->languages = $languages;
        $this->experience = $experience;
    }

    public function getLanguages()
    {
        return $this->languages;
    }
    public function setLanguages($languages)
    {
        $this->languages = $languages;
    }

    public function getExperience()
    {
        return $this->experience;
    }
    public function setExperience($experience)
    {
        $this->experience = $experience;
    }

    public function addLanguage($language)
    {
        if (!in_array($language, $this->languages)) {
            $this->languages[] = $language;
        }
    }

    /**
     * Реалізація абстрактного методу "Повідомлення при народженні дитини" для програміста
     */
    protected function birthMessage()
    {
        echo "Вітаємо майбутнього програміста!<br>";
    }
}
?>