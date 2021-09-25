<?php

namespace App\Test\Helpers\Logic;

use App\Helpers\Logics\GreaterThan;
use PHPUnit\Framework\TestCase;

class TestGreaterThan extends TestCase
{
    /**
     * @dataProvider dataProviderForLogicMethodTest
     * */
    public function testLogicMethod($argument, $value): void
    {
        $divisibleBy = new GreaterThan($argument);
        $result = $divisibleBy->logic($value);
        $this->assertTrue($result);
    }

    public function dataProviderForLogicMethodTest(): array
    {
        return [
            [3, 99],
            [5, 20],
            [6, 72],
        ];
    }
}