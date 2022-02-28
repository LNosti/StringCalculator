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

}
