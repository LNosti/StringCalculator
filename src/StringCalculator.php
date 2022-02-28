<?php

namespace Deg540\PHPTestingBoilerplate;

class StringCalculator
{
    function add(String $numbers): String
    {
        if(empty($numbers))
            return "0";
        if(str_contains($numbers, ",")) {
            $splitString = explode(",",$numbers);
            $sum = 0;
            foreach ($splitString as $number) {
                $sum = $sum + $number;
            }
            return $sum;
        }
        return $numbers;

    }

}