<?php
namespace Classes;
/**
 * Інтерфейс HouseCleaning
 */
interface HouseCleaning
{
    public function cleanRoom();
    public function cleanKitchen();
}

/**
 * Абстрактний клас Human, що реалізує HouseCleaning
 */
abstract class Human implements HouseCleaning
{
    protected $height;
    protected $weight;
    protected $age;

    public function __construct($height, $weight, $age)
    {
        $this->height = $height;
        $this->weight = $weight;
        $this->age = $age;
    }

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

    public function birthChild()
    {
        echo "Народилася дитина!<br>";
        $this->birthMessage();
    }

    abstract protected function birthMessage();
}

/**
 * Клас Student, що успадковує Human і реалізує HouseCleaning
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

    protected function birthMessage()
    {
        echo "Вітаємо нового студента!<br>";
    }

    public function cleanRoom()
    {
        echo "Студент прибирає кімнату<br>";
    }

    public function cleanKitchen()
    {
        echo "Студент прибирає кухню<br>";
    }
}

/**
 * Клас Programmer, що успадковує Human і реалізує HouseCleaning
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

    protected function birthMessage()
    {
        echo "Вітаємо майбутнього програміста!<br>";
    }

    public function cleanRoom()
    {
        echo "Програміст прибирає кімнату<br>";
    }

    public function cleanKitchen()
    {
        echo "Програміст прибирає кухню<br>";
    }
}
?>