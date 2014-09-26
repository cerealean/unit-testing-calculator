<?php


namespace Calculator\Test;

use Calculator\Calculator;
use Calculator\Exception\InvalidParameterException;

class CalculatorTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var Calculator
     */
    protected $calculator;

    public function setUp() {
        $this->calculator = new Calculator();
    }

    public function test_addShouldReturnInteger() {
        $internal_type = "integer";

        $actual = $this->calculator->add();

        $this->assertInternalType($internal_type, $actual);
    }

    public function test_addShouldReturn0IfNoParametersPassed() {
        $expected = 0;

        $actual = $this->calculator->add();

        $this->assertEquals($expected, $actual);
    }

    public function test_addShouldReturn2If2IsPassedAsParameter() {
        $expected     = 2;
        $first_number = 2;

        $actual = $this->calculator->add($first_number);

        $this->assertEquals($expected, $actual);
    }

    public function test_addShouldReturn4If4IsPassedAsParameter() {
        $expected     = 4;
        $first_number = 4;

        $actual = $this->calculator->add($first_number);

        $this->assertEquals($expected, $actual);
    }

    public function test_addShouldReturn6If4And2ArePassedAsParameters() {
        $expected      = 6;
        $first_number  = 4;
        $second_number = 2;

        $actual = $this->calculator->add($first_number, $second_number);

        $this->assertEquals($expected, $actual);
    }

    public function test_addShouldReturn50If25And25ArePassedAsParameters() {
        $expected      = 50;
        $first_number  = 25;
        $second_number = 25;

        $actual = $this->calculator->add($first_number, $second_number);

        $this->assertEquals($expected, $actual);
    }

    public function test_addShouldReturn80If20And20And10And30ArePassedAsParameters() {
        $expected = 80;

        $actual = $this->calculator->add(20, 20, 10, 30);

        $this->assertEquals($expected, $actual);
    }

    public function test_addShouldThrowInvalidParameterExceptionIfParameterIsAStringRawr() {
        $expected = 'Calculator\Exception\InvalidParameterException';

        try {
            $this->calculator->add("Rawr");
        }
        catch (InvalidParameterException $actual) {
        }

        $this->assertInstanceOf($expected, $actual);
    }

    public function test_addShouldThrowInvalidParameterExceptionIfOneParameterOutOfManyIsNotAnInteger() {
        $expected = 'Calculator\Exception\InvalidParameterException';

        try {
            $this->calculator->add(2, 3, 4, "I'm a string", 7);
        }
        catch (InvalidParameterException $actual) {
        }

        $this->assertInstanceOf($expected, $actual);
    }

    public function test_addShouldThrowInvalidParameterExceptionIfOneParameterOutOfManyIsAnIntegerInAString() {
        $expected = 'Calculator\Exception\InvalidParameterException';

        try {
            $this->calculator->add(2, 3, 4, "4", 7);
        }
        catch (InvalidParameterException $actual) {
        }

        $this->assertInstanceOf($expected, $actual);
    }

    public function test_subtractShouldReturnInteger() {
        $internal_type = "integer";

        $actual = $this->calculator->subtract();

        $this->assertInternalType($internal_type, $actual);
    }

    public function test_subtractShouldReturn0IfNoParameterPassed() {
        $expected = 0;

        $actual = $this->calculator->subtract();

        $this->assertEquals($expected, $actual);
    }

    public function test_subtractShouldReturnNegative2If2IsPassedAsParameter() {
        $expected = -2;

        $actual = $this->calculator->subtract(2);

        $this->assertEquals($expected, $actual);
    }

    public function test_subtractShouldReturnNegative4If4IsPassedAsParameter() {
        $expected = -4;

        $actual = $this->calculator->subtract(4);

        $this->assertEquals($expected, $actual);
    }

    public function test_subtractShouldReturn12IfNegative12IsPassedAsParameter() {
        $expected = 12;

        $actual = $this->calculator->subtract(-12);

        $this->assertEquals($expected, $actual);
    }

    public function test_subtractShouldReturn8IfNegative4AndNegative4ArePassedAsParameters() {
        $expected = 8;

        $actual = $this->calculator->subtract(-4, -4);

        $this->assertEquals($expected, $actual);
    }

    public function test_subtractShouldReturn0IfNegative4And4ArePassedAsParameters() {
        $expected = 0;

        $actual = $this->calculator->subtract(4, -4);

        $this->assertEquals($expected, $actual);
    }

    public function test_subtractShouldReturn10IfNegative20And5And5ArePassedAsParameters() {
        $expected = 10;

        $actual = $this->calculator->subtract(-20, 5, 5);

        $this->assertEquals($expected, $actual);
    }

    public function test_subtractShouldThrowInvalidParameterExceptionIfParameterIsAStringRawr() {
        $expected = 'Calculator\Exception\InvalidParameterException';

        try {
            $this->calculator->subtract("Rawr");
        }
        catch (InvalidParameterException $actual) {
        }

        $this->assertInstanceOf($expected, $actual);
    }

    public function test_subtractShouldThrowInvalidParameterExceptionIfOneParameterOutOfManyIsNotAnInteger() {
        $expected = 'Calculator\Exception\InvalidParameterException';

        try {
            $this->calculator->subtract(2, 3, 4, "I'm a string", 7);
        }
        catch (InvalidParameterException $actual) {
        }

        $this->assertInstanceOf($expected, $actual);
    }

    public function test_subtractShouldThrowInvalidParameterExceptionIfOneParameterOutOfManyIsAnIntegerInAString() {
        $expected = 'Calculator\Exception\InvalidParameterException';

        try {
            $this->calculator->subtract(2, 3, 4, "4", 7);
        }
        catch (InvalidParameterException $actual) {
        }

        $this->assertInstanceOf($expected, $actual);
    }

}
 