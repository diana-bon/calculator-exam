<?php

require __DIR__ . '/../vendor/autoload.php';

$operandsSubstraction = [10, 5];

$substraction = new \App\Calculator\Substraction;
$substraction->setOperands($operandsSubstraction);
echo $substraction->calculate()[0];

$operandsMultiplication = [5, 10];

$multiplication = new \App\Calculator\Multiplication;
$multiplication->setOperands($operands);
echo $multiplication->calculate()[0];