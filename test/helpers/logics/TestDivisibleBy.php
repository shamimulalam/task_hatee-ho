<?php
namespace App\Test\Helpers\Logic;

use App\Helpers\Logics\DivisibleBy;
use PHPUnit\Framework\TestCase;
class TestDivisibleBy extends TestCase
{
    /**
     * @dataProvider dataProviderForLogicMethodTest
     * */
    public function testLogicMethod($argument, $value): void
    {
        $divisibleBy = new DivisibleBy($argument);
        $result = $divisibleBy->logic($value);
        $this->assertTrue($result);
    }

    public function dataProviderForLogicMethodTest(): array
    {
        return [
            [3, 99],
            [5, 10],
            [6, 72],
        ];
    }

}