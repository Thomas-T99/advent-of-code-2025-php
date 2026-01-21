<?php

function process_input($input_file){
    $lines = file($input_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $input = array();
    foreach($lines as $line){
        $inputarray = array(substr($line, 0,1), substr($line, 1));
        array_push($input, $inputarray);
    }
    return $input;
}

function part1($input){
    $zero_count = 0;
    $dial_count = 50;
    foreach($input as $line){
        $direction = $line[0];
        $count = $line[1];
        if ($direction == "L") {
            $count = -$count;
        }
        $dial_count += $count;
        $dial_count = $dial_count % 100;
        $dial_count = $dial_count + 100;
        $dial_count = $dial_count % 100;
        if ($dial_count == 0) {
            $zero_count++;
        }
    }
    return $zero_count;
}

function part2($input){
    return "Not completed";
}