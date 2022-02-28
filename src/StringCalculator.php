<?php

namespace Deg540\PHPTestingBoilerplate;

class StringCalculator
{
    function add(String $numbers): String
    {
        if(empty($numbers)) {
            return "0";
        }

        if(str_ends_with($numbers, ",")) {
            return ("Number expected but not found.");
        }
        $splitString = $this->checkForCustomSeparator($numbers);
        if(empty($splitString)) {
            $checkedMultipleSeparators = $this->checkForMultipleSeparators($numbers);
            if ($checkedMultipleSeparators[0]) {
                return ("Number expected but '" . $checkedMultipleSeparators[1] . "' found at position " . $checkedMultipleSeparators[2] . ".");
            }

            $splitString = str_replace("\n", ",", $numbers);
        }

        if (str_contains($splitString,"'")) {
            return $splitString;
        }
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

    private function  checkForCustomSeparator($numbers) : String
    {
        if(str_starts_with($numbers,"//")) {
            $splitString = explode("\n",$numbers);
            $splitString[0] = substr($splitString[0],strlen("//"));
            if(str_contains($numbers,",")) {
                return "'" . $splitString[0] . "' expected but ',' found at position " . (strpos($splitString[1], ",")) . ".";

            }
            $splitString[1] = str_replace($splitString[0],",",$splitString[1]);
            return $splitString[1];
        }
        return '0';
    }

}