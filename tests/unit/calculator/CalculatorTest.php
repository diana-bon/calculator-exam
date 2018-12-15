<?php

class CalculatorTest extends \PHPUnit\Framework\TestCase
{

    /** @test */
    public function canSetSingleOperation()
    {
        $substraction = new App\Calculator\Substraction;
        $operands = [10, 5];
        $substraction->setOperands($operands);
        $calculator = new \App\Calculator\Calculator;
        $calculator->setOperation($substraction);
        $this->assertCount(1, $calculator->getOperations());
    }

    /** @test */
    public function canSetMultipleOperations()
    {
        $substraction1 = new App\Calculator\Substraction;
        $operands1 = [10, 5];
        $substraction1->setOperands($operands1);
        $substraction2 = new App\Calculator\Substraction;
        $operands2 = [2, 2];
        $substraction2->setOperands($operands2);
        $calculator = new \App\Calculator\Calculator;
        $calculator->setOperations([$substraction1, $substraction2]);
        $this->assertCount(2, $calculator->getOperations());
    }

    /** @test */
    public function operationsAreIgnoredIfNotInstanceOfOperationInterface()
    {
        $substraction = new App\Calculator\Substraction;
        $operands = [5, 10];
        $substraction->setOperands($operands);
        $calculator = new \App\Calculator\Calculator;
        $calculator->setOperations([$substraction, 'clement', 'test']);
        $this->assertCount(1, $calculator->getOperations());
    }

    /** @test */
    public function canCalculateResult()
    {
        $substraction = new App\Calculator\Substraction;
        $operands = [10, 5];
        $result = 5;
        $substraction->setOperands($operands);
        $calculator = new \App\Calculator\Calculator;
        $calculator->setOperation($substraction);
        $this->assertEquals($result, $calculator->calculate());
    }

    /** @test */
    public function calculateMethodReturnsMultipleResults()
    {
        $substraction = new App\Calculator\Substraction;
        $operands = [10, 5];
        $substraction->setOperands($operands); // 5
        $multiplication = new App\Calculator\Multiplication;
        $operands = [50, 2];
        $multiplication->setOperands($operands); // 100
        $calculator = new \App\Calculator\Calculator;
        $calculator->setOperations([$substraction, $multiplication]);
        $this->assertInternalType('array', $calculator->calculate());
        $this->assertEquals(5, $calculator->calculate()[0]);
        $this->assertEquals(100, $calculator->calculate()[1]);
    }
}