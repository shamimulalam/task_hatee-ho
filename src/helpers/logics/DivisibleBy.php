<?php

namespace App\Helpers\Logics;

/**
 * Divisible by logic implementation
 */
class DivisibleBy implements LogicInterface
{
    private $argument;
    function __construct($argument)
    {
        $this->argument = $argument;
    }

    public function logic($value): bool
    {
        if ($value%$this->argument !== 0) {
            throw new \Exception("Number is not divisible by");
        } else {
            return true;
        }
    }
}