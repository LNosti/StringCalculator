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
            return $splitString[0] + $splitString[1];
        }
        return $numbers;

    }

}