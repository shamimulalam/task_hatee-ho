<?php
require __DIR__ . "/vendor/autoload.php";

use App\LogicTesterImplementation;
use App\Helpers\Logics\DivisibleBy;
use App\Helpers\Logics\OneOf;
use App\Helpers\Logics\GreaterThan;

$logicTester = new LogicTesterImplementation();

// Task v1
echo "Task 1: \n"
    . $logicTester->checkLogicAndPrint(
    20, [
    array('logic' => [new DivisibleBy(3), new DivisibleBy(5)], 'print' => 'papow'),
    array('logic' => [new DivisibleBy(3)], 'print' => 'pa'),
    array('logic' => [new DivisibleBy(5)], 'print' => 'pow')
],
    " ")
    . "\n";

// Task v2
echo "Task 2: \n"
    . $logicTester->checkLogicAndPrint(
    15, [
    array('logic' => [new DivisibleBy(2), new DivisibleBy(7)], 'print' => 'hateeho'),
    array('logic' => [new DivisibleBy(7)], 'print' => 'ho'),
    array('logic' => [new DivisibleBy(2)], 'print' => 'hatee')
],
    "-")
    . "\n";

//Task v3
echo "Task 3: \n"
    . $logicTester->checkLogicAndPrint(
    10, [
    array('logic' => [new OneOf([1,4,9]), new GreaterThan(5)], 'print' => 'jofftchoff'),
    array('logic' => [new OneOf([1,4,9])], 'print' => 'joff'),
    array('logic' => [new GreaterThan(5)], 'print' => 'tchoff')
],
    "-")
    . "\n";