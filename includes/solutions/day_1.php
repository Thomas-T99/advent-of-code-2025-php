<?php

function processInput($inputFile){
    $lines = file($inputFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $input = array();
    foreach($lines as $line){
        $inputArray = array(substr($line, 0,1), substr($line, 1));
        array_push($input, $inputArray);
    }
    return $input;
}

function part1($input){
    $zeroCount = 0;
    $dialCount = 50;
    foreach($input as $line){
        $direction = $line[0];
        $count = $line[1];
        if ($direction == "L") {
            $count = -$count;
        }
        $dialCount += $count;
        $dialCount = $dialCount % 100;
        $dialCount = $dialCount + 100;
        $dialCount = $dialCount % 100;
        if ($dialCount == 0) {
            $zeroCount++;
        }
    }
    return $zeroCount;
}

function part2($input){
    $zeroCount = 0;
    $dialCount = 50;
    foreach($input as $line){
        $direction = $line[0];
        $count = $line[1];

        // Count and remove all full rotations in a request
        $full_rotations = intdiv($count, 100);
        $zeroCount += $full_rotations;
        $count = $count % 100;

        if ($dialCount == 0) {
            $starting_zero = true;
        } else {
            $starting_zero = false;
        }

        if ($direction == "L") {
            $count = -$count;
        }
        $dialCount += $count;

        if ($dialCount == 0) {
            $zeroCount++;
        } elseif ($dialCount < 0) {
            if (!$starting_zero) { // otherwise we would count the zero twice, at the end of the last rotation (below) and during this one
                $zeroCount++;
            }
            $dialCount = $dialCount + 100;
        } elseif ($dialCount >= 100) {
            $zeroCount++;
            $dialCount = $dialCount - 100;
        }
    }

    return $zeroCount;
}