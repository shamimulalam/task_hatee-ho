<?php

namespace App\Test\Helpers\Logic;

use App\Helpers\Logics\OneOf;
use PHPUnit\Framework\TestCase;

class TestOneOf extends TestCase
{
    /**
     * @dataProvider dataProviderForLogicMethodTest
     * */
    public function testLogicMethod($argument, $value): void
    {
        $divisibleBy = new OneOf($argument);
        $result = $divisibleBy->logic($value);
        $this->assertTrue($result);
    }

    public function dataProviderForLogicMethodTest(): array
    {
        return [
            [[99, 3, 100], 99],
            [[10,15,20], 10],
            [[100], 100],
        ];
    }
}