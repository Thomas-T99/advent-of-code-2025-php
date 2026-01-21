<?php
function processInput($inputFile){
    $lines = file($inputFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $input = array();
    foreach($lines as $line) {
        array_push($input, str_split($line));
    }
    print_r($input);
    return $input;
}
function part1($input){
    return "Not yet completed";
}
function part2($input){
    return "Not yet completed";
}