<?php
function processInput($inputFile){
    $lines = file($inputFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $input = array();
    foreach($lines as $line) {
        array_push($input, str_split($line));
    }
    return $input;
}
function part1($input){
    $sum = 0;
    foreach($input as $digits){
        $firstMax = 0;
        $secondMax = 0;
        for($i = 0; $i < count($digits) - 1; $i++){
            if($digits[$i] > $firstMax){
                $firstMax = $digits[$i];
                $secondMax = $digits[$i + 1];
                continue;
            }
            if($digits[$i + 1] > $secondMax){
                $secondMax = $digits[$i + 1];
            }
        }
        $sum += $firstMax * 10 + $secondMax;
    }
    return $sum;
}
function part2($input){
    return "Not yet completed";
}