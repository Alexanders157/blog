<?php

namespace App\Libraries\Animal;

interface HippoInterface
{
    public function speak(): string;
    public function changeColor(string $color): string;
}
