<?php

namespace App\Libraries\Animal;

abstract class Animal {

    protected $color;
    protected $speed;

    abstract protected function jump();

    public function run() {
        return '50km/h';
    }
}
