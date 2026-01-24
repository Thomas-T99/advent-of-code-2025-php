<?php
function processInput($inputFile){
    $lines = file($inputFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $input = array();
    foreach($lines as $line) {
        $input[] = str_split($line);
    }
    return $input;
}
function part1($input){
    return getRolls($input)["count"];
}

function part2($input){
    $count = 0;
    do {
        $result = getRolls($input);
        $rollsGrabbed = $result["count"];
        $input = $result["rolls"];
        $count += $rollsGrabbed;
    } while ($rollsGrabbed > 0);

    return $count;
}

function getRolls($input){
    $count = 0;

    for ($row=0; $row < count($input); $row++) {
        $rowArray = $input[$row];
        for ($col=0; $col < count($rowArray); $col++) {
            if ($input[$row][$col] != '@'){
                continue;
            }

            $startRow = -1;
            $endRow = 1;
            $startCol = -1;
            $endCol = 1;

            switch ($row) {
                case 0:
                    $startRow = 0;
                    break;
                case (count($input) - 1):
                    $endRow = 0;
                    break;
            }
            switch ($col) {
                case 0:
                    $startCol = 0;
                    break;
                case (count($rowArray) - 1):
                    $endCol = 0;
                    break;
            }

            $adjacentRolls = 0;
            for ($i = $startRow; $i <= $endRow; $i++) {
                for ($j = $startCol; $j <= $endCol; $j++) {
                    if ($i == 0 && $j == 0) {
                        continue;
                    }
                    if ($input[$row + $i][$col + $j] == '@') {
                        $adjacentRolls++;

                    }
                }
            }

            if ($adjacentRolls < 4) {
                $count++;
                $input[$row][$col] = ".";
            }
        }
    }
    return ["count" => $count, "rolls" => $input];
}