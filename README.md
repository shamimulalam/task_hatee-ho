# Task hatee-ho

A sample implementation of the tasks hatee-ho provided on the following link
https://gist.github.com/mariusbalcytis/205de9e4ef7d29fc051f4e572bb30184 

## How to run
- clone the project from repo
```
- cd to task_hatee-ho
- php main.php
It will show you the output
```

## Test More
```
You should be able to test with any combination of implemented logic change and add the code on main.php

# example
//Task v3
$logicTester->testLogicAndPrint(
	10, [
		array('logic' => [new LogicOneOf([1,4,9]), new LogicGreaterThan(5)], 'print' => 'jofftchoff'),
		array('logic' => [new LogicOneOf([1,4,9])], 'print' => 'joff'),
	 	array('logic' => [new LogicGreaterThan(5), new LogicDivisibleBy(2)], 'print' => 'tchoff')
	], 
	"-");
echo "\n";
```

## Implement New Custom Logic
```
Implement a class that implements LogicInterface interface see the examples  
LogicDivisibleBy/LogicOneOf logic implemented on logic_implementation.php file
```
