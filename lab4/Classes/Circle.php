<?php
namespace Classes;
class Circle
{
    /** @var float $x Координата X центру кола */
    public $x;

    /** @var float $y Координата Y центру кола */
    public $y;

    /** @var float $radius Радіус кола */
    public $radius;

    /**
     * Конструктор класу Circle.
     *
     * @param float $x Координата X центру
     * @param float $y Координата Y центру
     * @param float $radius Радіус кола
     */
    public function __construct($x, $y, $radius)
    {
        $this->setX($x);
        $this->setY($y);
        $this->setRadius($radius);
    }

    /**
     * Отримує координату X центру кола.
     *
     * @return float
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * Встановлює координату X центру кола.
     *
     * @param float $x
     */
    public function setX($x)
    {
        $this->x = $x;
    }

    /**
     * Отримує координату Y центру кола.
     *
     * @return float
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * Встановлює координату Y центру кола.
     *
     * @param float $y
     */
    public function setY($y)
    {
        $this->y = $y;
    }

    /**
     * Отримує радіус кола.
     *
     * @return float
     */
    public function getRadius()
    {
        return $this->radius;
    }

    /**
     * Встановлює радіус кола (повинен бути додатним числом).
     *
     * @param float $radius
     */
    public function setRadius($radius)
    {
        if ($radius <= 0) {
            echo "<p>Радіус повинен бути більше 0</p>";
        }
        $this->radius = $radius;
    }

    /**
     * Повертає рядок, що описує коло.
     *
     * @return string
     */
    public function __toString()
    {
        return "Коло з центром в ({$this->x}, {$this->y}) і радіусом {$this->radius}";
    }
}