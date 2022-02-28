<?php

namespace Deg540\PHPTestingBoilerplate;

class StringCalculator
{
    function add(String $numbers): String
    {
        if(empty($numbers))
            return "0";
        $splitString = str_replace("\n",",",$numbers);
        $splitString = explode(",",$splitString);
        $sum = 0;
        foreach ($splitString as $number) {
            $sum = $sum + $number;
        }
        return $sum;
    }

}