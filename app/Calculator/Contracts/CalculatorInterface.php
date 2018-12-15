<?php

namespace App\Calculator\Contracts;


interface CalculatorInterface
{
    public function setOperands($operands);
    public function calculate();
}