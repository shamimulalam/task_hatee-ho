<?php

namespace App\Helpers;

use App\Helpers\Logics\LogicInterface;

/**
 * This class test method accepts two parameters
 * 1. the value to test against
 * 2. custom logic implementation instance that implements LogicInterface
 */
class LogicTester
{
    public function check($value, LogicInterface $logic): bool
    {
        return $logic->logic($value);
    }
}