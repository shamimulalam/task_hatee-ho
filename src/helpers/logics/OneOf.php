<?php

namespace App\Helpers\Logics;

/**
 * One of the number choice logic implementation
 */
class OneOf implements LogicInterface
{
    private $argument;
    function __construct(array $argument)
    {
        $this->argument = $argument;
    }

    public function logic($value): bool
    {
        if(!in_array($value, $this->argument)){
            throw new \Exception("Number is not one of the numbers");
        }else{
            return true;
        }
    }
}