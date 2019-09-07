<?php

/**
* All the custom logic tester should be implementing
* this LogicInterface so that it the logic tester can
* call generic testLogic method with a value to test against
* on all instances of LogicInterface implementation
*/
interface LogicInterface 
{
	public function testLogic($value);
}

/**
* Divisible by logic implementation
*/
class LogicDivisibleBy implements LogicInterface
{
	
	private $argument;
	function __construct($argument)
	{
		$this->argument = $argument;
	}

	public function testLogic($value) {
		if($value%$this->argument !== 0){
			throw new Exception("Number is not divisible by");
		}else{
			return true;
		}
	}
}

/**
* Larger Than a number logic implementation
*/
class LogicGreaterThan implements LogicInterface
{
	private $argument;
	function __construct($argument)
	{
		$this->argument = $argument;
	}

	public function testLogic($value) {
		if(!($value > $this->argument)){
			throw new Exception("Number is not larger than");
		}else{
			return true;
		}
	}
}

/**
* One of the number choice logic implementation
*/
class LogicOneOf implements LogicInterface
{
	
	private $argument;
	function __construct(array $argument)
	{
		$this->argument = $argument;
	}

	public function testLogic($value) {
		if(!in_array($value, $this->argument)){
			throw new Exception("Number is not one of the numbers");
		}else{
			return true;
		}
	}
}

/**
* This class test method accepts two parameters
* 1. the value to test against
* 2. custom logic implementation instance that implements LogicInterface 
*/
class LogicTester 
{
	public function test($value, LogicInterface $logic) {
		return $logic->testLogic($value);
	} 
}