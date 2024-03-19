<?php

namespace App\Libraries\Animal;

class Hippo extends Animal implements HippoInterface
{
    protected $properties;

    public function __construct($properties)
    {
        $this->properties = $properties;
    }

    public function jump()
    {
        return "Бегемот прыгает со скоростью " . $this->speed . " км/ч";
    }

    public function speak()
    {
        return "Бегемот говорит: " . $this->properties['phrase'];
    }

    public function changeColor($color)
    {
        $this->color = $color;
        return "Цвет бегемота изменён на " . $this->color;
    }
}
