<?php

namespace App\Application\Generator;

interface CodeGenerator
{
    public function generate(): string;
}