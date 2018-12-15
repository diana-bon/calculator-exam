<?php

class MultiplicationTest extends \PHPUnit\Framework\TestCase
{

    /** @test */
    public function addsUpGivenOperands()
    {
        $multiplication = new \App\Calculator\Multiplication;
        $operands = [5, 10];
        $result = 50;
        $multiplication->setOperands($operands);
        $this->assertEquals($result, $multiplication->calculate());
    }

    /** @test */
    public function noOperandsGivenThrowExeptionWhenCalculating()
    {
        $this->expectException(\App\Calculator\Exceptions\NoOperandsException::class);
        $multiplication = new \App\Calculator\Multiplication;
        $multiplication->calculate();
    }

    /** @test */
    public function incorrectOperandsGivenThrowExeption()
    {
        $this->expectException(\App\Calculator\Exceptions\IncorrectOperandsException::class);
        $operands = ['clement', 10];
        $multiplication = new \App\Calculator\Multiplication;
        $multiplication->setOperands($operands);
        $multiplication->calculate();
    }

}