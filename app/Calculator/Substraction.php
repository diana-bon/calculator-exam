<?php

namespace App\Calculator;

use App\Calculator\Exceptions\NoOperandsException;
use App\Calculator\Contracts\CalculatorInterface;
use App\Calculator\Exceptions\IncorrectOperandsException;

class Substraction implements CalculatorInterface
{
    protected $operands;

    public function setOperands($operands)
    {
        $this->operands = $operands;
    }

    public function calculate()
    {
        $sub = 0;
        if($this->operands) {
            if(is_array($this->operands) || is_object($this->operands)) {
                foreach($this->operands as $key=>$value)
                {
                    if(is_numeric(preg_replace('/[^0-9]/', '', $value))){
                        if($value > 0) {
                            if($sub == 0){
                                $sub += $value;
                            } else {
                                $sub -= $value;
                            }
                        }
                    } else {
                        throw new IncorrectOperandsException();
                    }
                }
            } else {
                throw new NoOperandsException();
            }
        } else {
            throw new NoOperandsException();
        }
        return $sub;
    }
}