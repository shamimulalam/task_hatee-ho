<?php

namespace App\Test;

use App\Helpers\Logics\DivisibleBy;
use App\Helpers\Logics\GreaterThan;
use App\Helpers\Logics\OneOf;
use App\Helpers\LogicTester;
use App\LogicTesterImplementation;
use PHPUnit\Framework\TestCase;

class TestLogicTesterImplementation extends TestCase
{
    protected $logicTesterImplementation;
    protected function setUp(): void
    {
        $logicTesterMock = $this->createMock(LogicTester::class)
                                ->method("check")
                                ->willReturn(false);
        $this->logicTesterImplementation = new LogicTesterImplementation($logicTesterMock);
    }

    /**
     * @dataProvider dataProviderForLogicCheckMethodTest
     * */
    public function testLogicCheckTest($value, $logicInterfaceImplementation): void
    {
        $result = $this->logicTesterImplementation->logicCheck($value, $logicInterfaceImplementation);
        $this->assertEquals($value, $result);
    }

    public function dataProviderForLogicCheckMethodTest(): array
    {
        return [
            [6, new DivisibleBy(3)],
            [6, new GreaterThan(3)],
            [6, new OneOf([3,9,6])],
        ];
    }

    /**
     * @dataProvider dataProviderForCheckLogicAndPrintMethod
     * */
    public function testCheckLogicAndPrintMethod($loopCount, $logics, $separator, $expectation): void
    {
        $result = $this->logicTesterImplementation->checkLogicAndPrint($loopCount, $logics, $separator);
        $this->assertEquals($expectation, $result);
    }
    public function dataProviderForCheckLogicAndPrintMethod(): array
    {
        return [
            array(20, [
                 array('logic' => [new DivisibleBy(3), new DivisibleBy(5)], 'print' => 'papow'),
                 array('logic' => [new DivisibleBy(3)], 'print' => 'pa'),
                 array('logic' => [new DivisibleBy(5)], 'print' => 'pow')
             ], " ", "1 2 pa 4 pow pa 7 8 pa pow 11 pa 13 14 papow 16 17 pa 19 pow"),
            array(15, [
                array('logic' => [new DivisibleBy(2), new DivisibleBy(7)], 'print' => 'hateeho'),
                array('logic' => [new DivisibleBy(7)], 'print' => 'ho'),
                array('logic' => [new DivisibleBy(2)], 'print' => 'hatee')
             ], "-", "1-hatee-3-hatee-5-hatee-ho-hatee-9-hatee-11-hatee-13-hateeho-15"),
            array(10, [
                array('logic' => [new OneOf([1,4,9]), new GreaterThan(5)], 'print' => 'jofftchoff'),
                array('logic' => [new OneOf([1,4,9])], 'print' => 'joff'),
                array('logic' => [new GreaterThan(5)], 'print' => 'tchoff')
             ], "-", "joff-2-3-joff-5-tchoff-tchoff-tchoff-jofftchoff-tchoff"),
        ];
    }
}