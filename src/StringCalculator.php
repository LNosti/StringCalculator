<?php

namespace Deg540\PHPTestingBoilerplate;

use phpDocumentor\Reflection\PseudoTypes\NegativeInteger;

class StringCalculator
{
    function add(String $numbers): String
    {
        $errors = "";
        $hasErrors = false;
        if(empty($numbers)) {
            return "0";
        }

        if(str_ends_with($numbers, ",")) {
            $hasErrors = true;
            $errors .= ("Number expected but not found.");
        }
        $splitString = $this->checkForCustomSeparator($numbers);
        if(empty($splitString)) {
            $checkedMultipleSeparators = $this->checkForMultipleSeparators($numbers);
            if ($checkedMultipleSeparators[0]) {
                $hasErrors = true;
                $errors .= ("Number expected but '" . $checkedMultipleSeparators[1] . "' found at position " . $checkedMultipleSeparators[2] . ".");
            }

            $splitString = str_replace("\n", ",", $numbers);
        }

        else if (str_contains($splitString,"expected but ','")) {
            $hasErrors = true;
            $errors .= $splitString;
        }
        $splitString = explode(",",$splitString);

        $checkedForNegatives = $this->checkForNegatives($splitString);
        if(!empty($checkedForNegatives)) {
            $hasErrors = true;
            $errors .= ("Negative not allowed: " . $checkedForNegatives);
        }

        if($hasErrors) {
            return $errors;
        }

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

    private function checkForNegatives($numbers) : String {
        $negativeNumbers = "";
        foreach ($numbers as $number) {
            if(is_numeric($number) & $number < 0) {
                $negativeNumbers = $negativeNumbers . $number . ", ";
            }
        }
        if(!empty($negativeNumbers)) {
            $negativeNumbers = substr($negativeNumbers, 0, -2);
        }
        return $negativeNumbers;

    }

}