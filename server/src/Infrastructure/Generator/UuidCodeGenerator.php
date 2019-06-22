<?php

namespace App\Infrastructure\Generator;

use App\Application\Generator\CodeGenerator;
use Exception;
use Ramsey\Uuid\Uuid;

class UuidCodeGenerator implements CodeGenerator
{

    public function generate(): string
    {
        try {
            return Uuid::uuid1();
        } catch (Exception $e) {
        }
    }
}