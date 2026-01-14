<?php

function process_input($input_file){
    fopen($input_file, "r") or die("Unable to open file!");
    fread($input_file, filesize($input_file));
    fclose($input_file);
}
