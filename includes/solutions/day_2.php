<?php

function process_input($inputFile){
    $fileContents = file_get_contents($inputFile);
    $ranges = explode(",", $fileContents);
    $input = array();
    foreach($ranges as $range){
        $rangeArray = explode("-", $range);
        array_push($input, $rangeArray);
    }
    return $input;
}

function part1($input){
    $invalidSum = 0;
    foreach($input as $range){
        $min = $range[0];
        $max = $range[1];
        $minLength = strlen($min);
        $maxLength = strlen($max);

        if($minLength == $maxLength && $minLength % 2 != 0) {
            continue;
        }

        for($int = $min; $int < $max; $int++){
            $str = (string)$int;
            $strLength = strlen($str);
            if($strLength % 2 != 0){
                continue;
            }
            $firstHalf = substr($str, 0, $strLength / 2);
            $lastHalf = substr($str, $strLength / 2);
            if($firstHalf == $lastHalf){
                $invalidSum += $int;
            }
        }
    }
    return $invalidSum;
}

function part2($input){
    return "Not yet completed";
}