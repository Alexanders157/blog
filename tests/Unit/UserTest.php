<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Libraries\Cat;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_cat_initialization()
    {
        $cat = new Cat('Барсик', 'Сиамская', 10);

        $this->assertEquals('Барсик', $cat->name);
        $this->assertEquals('Сиамская', $cat->breed);
        $this->assertEquals(10, $cat->speed);
    }
}
