<?php

namespace Deg540\PHPTestingBoilerplate;

class StringCalculator
{
    function add(String $numbers): String
    {
        if(empty($numbers)) {
            return "0";
        }

        $checkedMultipleSeparators = $this->checkForMultipleSeparators($numbers);
        if($checkedMultipleSeparators[0]) {
            return ("Number expected but '" . $checkedMultipleSeparators[1] . "' found at position " . $checkedMultipleSeparators[2] . ".");
        }

        $splitString = str_replace("\n",",",$numbers);
        $splitString = explode(",",$splitString);
        $sum = 0;
        foreach ($splitString as $number) {
            $sum = $sum + $number;
        }
        return $sum;
    }

    private function checkForMultipleSeparators($numbers) : array
    {

        if(str_contains($numbers,",,")) {
            return [true, ",", strpos($numbers,",,")+1];
        }
        if(str_contains($numbers,",\n")) {
            return [true, "\\n", strpos($numbers,",\n")+1];
        }

        if(str_contains($numbers,"\n,")) {
            return [true, ",", strpos($numbers,"\n,")+1];
        }
        if(str_contains($numbers,"\n\n")) {
            return [true, "\\n", strpos($numbers,"\n\n")+1];
        }

        return  [false];
    }
}