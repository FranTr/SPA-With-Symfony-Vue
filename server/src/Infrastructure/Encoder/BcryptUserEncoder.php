<?php

namespace App\Infrastructure\Encoder;

use App\Application\Encoder\UserEncoder;

class BcryptUserEncoder implements UserEncoder
{
    public function encode(string $string): string
    {
        return $string;
    }

    public function decode(string $string): string
    {
        return $string;
    }
}
