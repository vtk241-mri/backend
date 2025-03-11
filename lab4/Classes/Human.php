<?php
namespace Classes;
/**
 * Клас Human
 */
class Human
{
    private $height;
    private $weight;
    private $age;

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
}

/**
 * Клас Student успадковує Human
 */
class Student extends Human
{
    private $university;
    private $course;

    /**
     * Конструктор класу Student.
     *
     * @param int $height Зріст (см)
     * @param int $weight Вага (кг)
     * @param int $age Вік (років)
     * @param string $university Назва університету
     * @param int $course Курс навчання
     */
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

    /**
     * Переведення студента на наступний курс.
     */
    public function promoteToNextCourse()
    {
        $this->course++;
    }
}

/**
 * Клас Programmer успадковує Human
 */
class Programmer extends Human
{
    private $languages = [];
    private $experience;

    /**
     * Конструктор класу Programmer.
     *
     * @param int $height Зріст (см)
     * @param int $weight Вага (кг)
     * @param int $age Вік (років)
     * @param array $languages Масив мов програмування
     * @param int $experience Досвід роботи (років)
     */
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

    /**
     * Додає нову мову програмування.
     *
     * @param string $language Назва мови програмування
     */
    public function addLanguage($language)
    {
        if (!in_array($language, $this->languages)) {
            $this->languages[] = $language;
        }
    }
}
?>