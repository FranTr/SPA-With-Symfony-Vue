<?php

namespace App\Application\Encoder;

interface UserEncoder
{
    public function encode(string $string): string;
    public function decode(string $string): string;
}
