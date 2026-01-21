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
    $zero_count = 0;
    $dial_count = 50;
    foreach($input as $line){
        $direction = $line[0];
        $count = $line[1];

        // Count and remove all full rotations in a request
        $full_rotations = intdiv($count, 100);
        $zero_count += $full_rotations;
        $count = $count % 100;



        if ($dial_count == 0) {
            $starting_zero = true;
        } else {
            $starting_zero = false;
        }

        if ($direction == "L") {
            $count = -$count;
        }
        $dial_count += $count;

        if ($dial_count == 0) {
            $zero_count++;
        } elseif ($dial_count < 0) {
            if (!$starting_zero) { // otherwise we would count the zero twice, at the end of the last rotation (below) and during this one
                $zero_count++;
            }
            $dial_count = $dial_count + 100;
        } elseif ($dial_count >= 100) {
            $zero_count++;
            $dial_count = $dial_count - 100;
        }
    }

    return $zero_count;
}