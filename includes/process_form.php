<?php
session_start();

$solutionFile = $_POST['problem'];
$solutionPart = $_POST['problem-part'];
$inputFile = $_POST['input-file'];

$solutionFilePath = "solutions/$solutionFile.php";

/* TODO: Validate the inputs
The day must be selected, and the file for the day must exist
The solution part must equal 1 or 2
There must be an input file. Check both inputs/ if it is empty. The file must be a .txt
*/

require_once($solutionFilePath);

$input = processInput($inputFile);

$solution = "";
switch ($solutionPart) {
    case "1":
        $solution = part1($input);
        break;
    case "2":
        $solution = part2($input);
        break;
}
$_SESSION['solution'] = $solution;

http_redirect("index.php");