<?php

namespace App\Libraries;

abstract class Pets
{
    protected int $tail; //хвост
    public function eat() {
        return 1;
    }

    public function eat2() {}
}
