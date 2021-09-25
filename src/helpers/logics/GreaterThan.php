<?php

namespace App\Helpers\Logics;

/**
 * Larger Than a number logic implementation
 */
class GreaterThan implements LogicInterface
{
    private $argument;
    function __construct($argument)
    {
        $this->argument = $argument;
    }

    public function logic($value): bool
    {
        if (!($value > $this->argument)) {
            throw new \Exception("Number is not larger than");
        } else {
            return true;
        }
    }
}