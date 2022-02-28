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

    /**
     * @test
     */
    public function allows_string_with_newline_separator()
    {
        $stringCalculator = new StringCalculator();
        $calculatedString = $stringCalculator->add("1\n2,3");

        $this->assertEquals("6",$calculatedString);
    }

    /**
     * @test
     */
    public function invalid_using_multiple_successive_separators()
    {
        $stringCalculator = new StringCalculator();
        $calculatedString = $stringCalculator->add("175.2,\n35");

        $this->assertEquals("Number expected but '\\n' found at position 6.",$calculatedString);
    }

    /**
     * @test
     */
    public function invalid_missing_number_last_position()
    {
        $stringCalculator = new StringCalculator();
        $calculatedString = $stringCalculator->add("1,3,");

        $this->assertEquals("Number expected but not found.",$calculatedString);
    }

    /**
     * @test
     */
    public function allows_string_with_custom_separator()
    {
        $stringCalculator = new StringCalculator();
        $calculatedString = $stringCalculator->add("//;\n1;2");

        $this->assertEquals("3",$calculatedString);
    }

    /**
     * @test
     */
    public function invalid_string_with_custom_separator()
    {
        $stringCalculator = new StringCalculator();
        $calculatedString = $stringCalculator->add("//|\n1|2,3");

        $this->assertEquals("'|' expected but ',' found at position 3.",$calculatedString);
    }
}
