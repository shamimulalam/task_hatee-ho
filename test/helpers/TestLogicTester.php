<?php

namespace App\Test\Helpers;

use App\Helpers\Logics\DivisibleBy;
use App\Helpers\Logics\GreaterThan;
use App\Helpers\Logics\OneOf;
use App\Helpers\LogicTester;
use PHPUnit\Framework\TestCase;

class TestLogicTester extends TestCase
{
    /**
     * @dataProvider dataProviderForCheckMethodTest
     * */
    public function testCheckMethod($value, $logicInterfaceImplementation): void
    {
        $logicTester = new LogicTester();
        $result = $logicTester->check($value, $logicInterfaceImplementation);
        $this->assertTrue($result);
    }
    public function dataProviderForCheckMethodTest(): array
    {
        return [
            [6, new DivisibleBy(3)],
            [6, new GreaterThan(3)],
            [6, new OneOf([3,9,6])],
        ];
    }
}