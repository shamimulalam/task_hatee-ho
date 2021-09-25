<?php

namespace App;

use App\Helpers\Logics\LogicInterface;
use App\Helpers\LogicTester;

class LogicTesterImplementation
{
    private $logicTester;

    function __construct(){
        $this->logicTester = new LogicTester();
    }

    public function logicCheck($number, LogicInterface $item): int
    {
        if($this->logicTester->check($number, $item))
            return $number;
    }

    // this function test numbers with provided logics and prints
    // expected output. It takes 3 parameters
    // 1. loopCount number to loop through and test gainst
    // 2. array of logic assosiative arrays. each item of the array should be of the following format array('logic' => [new LogicDivisibleBy(3), new LogicDivisibleBy(5)], 'print' => 'papow')
    // 3. separetor to separete the outputs
    function checkLogicAndPrint($loopCount, array $logics, $separetor): string
    {
        $result = '';
        for($i = 1; $i <= $loopCount; $i++) {
            if($i > 1)
                $result .= $separetor;
            $logicNotMatched = true;
            foreach ($logics as $logic) {
                try {
                    array_reduce($logic['logic'], array($this,'logicCheck'), $i);
                    $result .= $logic['print'];
                    $logicNotMatched = false;
                    break;
                } catch (\Exception $e) {
                    $logicNotMatched = true;
                }
            }
            if($logicNotMatched) $result .= $i;
        }
        return $result;
    }
}