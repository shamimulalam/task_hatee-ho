<?php
require_once 'logic_implementation.php';

class LogicTesterImplementation
{
	private $logicTester;

	function __construct(){
		$this->logicTester = new LogicTester();
	}

	public function testLogic($number, LogicInterface $item){
		if($this->logicTester->test($number, $item))
			return $number;
	}

	// this function test numbers with provided logics and prints
	// expected output. It takes 3 parameters
	// 1. loopCount number to loop through and test gainst
	// 2. array of logic assosiative arrays. each item of the array should be of the following format array('logic' => [new LogicDivisibleBy(3), new LogicDivisibleBy(5)], 'print' => 'papow')
	// 3. separetor to separete the outputs  
	function testLogicAndPrint($loopCount, array $logics, $separetor){
		$logicNotMatched;
		for($i = 1; $i <= $loopCount; $i++) {
			if($i > 1)
				echo $separetor;
			$logicNotMatched = true;
			foreach ($logics as $logic) {
				try {
					array_reduce($logic['logic'], array($this,'testLogic'), $i);	
					echo $logic['print'];
					$logicNotMatched = false;
					break;		
				} catch (Exception $e) {
					$logicNotMatched = true;
				}		
			}
			if($logicNotMatched) echo $i;
		}
	}
}

$logicTester = new LogicTesterImplementation();

// Task v1
$logicTester->testLogicAndPrint(
	20, [
		array('logic' => [new LogicDivisibleBy(3), new LogicDivisibleBy(5)], 'print' => 'papow'),
		array('logic' => [new LogicDivisibleBy(3)], 'print' => 'pa'),
	 	array('logic' => [new LogicDivisibleBy(5)], 'print' => 'pow')
	], 
	" ");
echo "\n";

// Task v2
$logicTester->testLogicAndPrint(
	15, [
		array('logic' => [new LogicDivisibleBy(2), new LogicDivisibleBy(7)], 'print' => 'hateeho'),
		array('logic' => [new LogicDivisibleBy(7)], 'print' => 'ho'),
	 	array('logic' => [new LogicDivisibleBy(2)], 'print' => 'hatee')
	], 
	"-");
echo "\n";

//Task v3
$logicTester->testLogicAndPrint(
	10, [
		array('logic' => [new LogicOneOf([1,4,9]), new LogicGreaterThan(5)], 'print' => 'jofftchoff'),
		array('logic' => [new LogicOneOf([1,4,9])], 'print' => 'joff'),
	 	array('logic' => [new LogicGreaterThan(5)], 'print' => 'tchoff')
	], 
	"-");
echo "\n";
