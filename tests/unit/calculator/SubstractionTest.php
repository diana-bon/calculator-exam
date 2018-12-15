<?php

class SubstractionTest extends \PHPUnit\Framework\TestCase
{

    /** @test */
    public function addsUpGivenOperands()
    {
        $substraction = new \App\Calculator\Substraction;
        $operands = [10, 5];
        $result = 5;
        $substraction->setOperands($operands);
        $this->assertEquals($result, $substraction->calculate());
    }

    /** @test */
    public function noOperandsGivenThrowExeptionWhenCalculating()
    {
        $this->expectException(\App\Calculator\Exceptions\NoOperandsException::class);
        $substraction = new \App\Calculator\Substraction;
        $substraction->calculate();
    }

    /** @test */
    public function incorrectOperandsGivenThrowExeption()
    {
        $this->expectException(\App\Calculator\Exceptions\IncorrectOperandsException::class);
        $operands = ['clement', 10];
        $substraction = new \App\Calculator\Substraction;
        $substraction->setOperands($operands);
        $substraction->calculate();
    }

}