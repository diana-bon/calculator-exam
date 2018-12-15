<?php

namespace App\Calculator;

class Calculator
{
    protected $calculator;

    public function getOperations()
    {
        print_r($this->calculator);
        return [$this->calculator];
    }

    public function setOperation($operands)
    {
        array_push($this->setOperation(), $operands);
    }

    public function setOperations($operands)
    {
        $this->calculator = $operands;
    }

    public function calculate()
    {
        return $this->calculator;
    }
}