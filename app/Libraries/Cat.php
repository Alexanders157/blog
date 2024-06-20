<?php

namespace App\Libraries;

class Cat extends Pets implements PetsInterface
{
    private const PAWS = 4;
    public string $breed;
    public string $name;
    public int|null $speed = null;

    public function __construct(string $name, string $breed, int|null $speed = null)
    {
        $this->name = $name;
        $this->breed = $breed;
        $this->speed = $speed;
    }

    public function run()
    {
        if ($this->speed) {
           // return "Кот по кличке: {$this->name} породы: {$this->breed}, {$this->append()}, а затем побежал бежит со скоростью {$this->speed} км/ч и у него ".self::PAWS." лапы";
        return "Кот бежит";
        }
        return "Без спидов";
    }


    private function append()
    {
        return "Кот сначала гулял";
        //return "Кот по кличке: {$this->name} породы: {$this->breed}, гуляет со скоростью {$this->speed} км/ч";
    }

}
