<?php

namespace App\Helpers\Logics;

/**
 * All the custom logic tester should be implementing
 * this LogicInterface so that it the logic tester can
 * call generic testLogic method with a value to test against
 * on all instances of LogicInterface implementation
 */
interface LogicInterface
{
    public function logic($value): bool;
}