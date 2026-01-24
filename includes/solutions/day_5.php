<?php
function processInput($inputFile){
    $lines = file($inputFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $lineIndex = 0;
    $ranges = array();
    $values = array();
    while (str_contains($lines[$lineIndex],"-")) {
        $ranges[] = explode("-", $lines[$lineIndex]);
        $lineIndex++;
    }
    while($lineIndex < count($lines)){
        $values[] = $lines[$lineIndex];
        $lineIndex++;
    }
    return array(
        "ranges" => $ranges,
        "values" => $values
    );
}

function part1($input){
    $count = 0;
    foreach($input["values"] as $value){
        $missed = true;
        foreach($input["ranges"] as $range){
            if($range[0] <= $value && $value <= $range[1]){
                $missed = false;
                $count++;
                break;
            }
        }
        if($missed){
            print "Missed: " . $value . "\n";
        }
    }
    return $count;
}
function part2($input){}
