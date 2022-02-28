<?php

declare(strict_types=1);

namespace Deg540\PHPTestingBoilerplate\Test;

use Deg540\PHPTestingBoilerplate\StringCalculator;
use PHPUnit\Framework\TestCase;

final class StringCalculatorTest extends TestCase
{


    /**
     * @test
     */
    public function empty_string_returns_0()
    {
        $stringCalculator = new StringCalculator();
        $calculatedString = $stringCalculator->add('0');

        $this->assertEquals("0",$calculatedString);
    }

    /**
     * @test
     */
    public function one_number_returns_same_number()
    {
        $stringCalculator = new StringCalculator();
        $calculatedString = $stringCalculator->add("1");

        $this->assertEquals("1",$calculatedString);
    }

    /**
     * @test
     */
    public function one_number_with_decimals_returns_same_number()
    {
        $stringCalculator = new StringCalculator();
        $calculatedString = $stringCalculator->add("1.1");

        $this->assertEquals("1.1",$calculatedString);
    }

    /**
     * @test
     */
    public function two_numbers_return_sum()
    {
        $stringCalculator = new StringCalculator();
        $calculatedString = $stringCalculator->add("1.1,2.2");

        $this->assertEquals("3.3",$calculatedString);
    }

    /**
     * @test
     */
    public function more_than_two_numbers_return_sum()
    {
        $stringCalculator = new StringCalculator();
        $calculatedString = $stringCalculator->add("1.1,2.2,3.3");

        $this->assertEquals("6.6",$calculatedString);
    }
}
