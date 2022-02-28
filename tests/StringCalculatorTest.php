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
    public function string_is_empty()
    {
        $stringCalculator = new StringCalculator();
        $calculatedString = $stringCalculator->add('0');

        $this->assertEquals("0",$calculatedString);
    }

}
