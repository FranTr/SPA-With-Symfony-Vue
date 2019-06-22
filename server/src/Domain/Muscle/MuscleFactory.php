<?php

namespace App\Domain\Muscle;

use App\Application\Generator\CodeGenerator;
use InvalidArgumentException;

class MuscleFactory
{
    /**
     * @var CodeGenerator
     */
    private $codeGenerator;

    public function __construct(CodeGenerator $codeGenerator)
    {
        $this->codeGenerator = $codeGenerator;
    }

    public function createObject(string $muscleName){
        if (!$muscleName) {
            throw new InvalidArgumentException();
        }
        return new Muscle(
            $this->codeGenerator->generate(),
            $muscleName
        );
    }
}
