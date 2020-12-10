<?php

include('../functions.php');

$data = getInput("\n", 'input.txt');

$visited_keys = [];
$current_key = 0;
$accumulator = 0;

while(true) {
    list($cmd, $val) = explode(' ', $data[$current_key]);

    $visited_keys[] = $current_key;

    switch ($cmd) {
        case 'nop':
            $current_key++;
            break;
        case 'acc':
            $accumulator_orig = $accumulator;
            $accumulator += (int)$val;
            $current_key++;
            break;
        case 'jmp':
            $current_key += (int)$val;
            break;
        default:
            print "Invalid CMD! ($cmd)" . "\n";
            break;
    }

    if (in_array($current_key, $visited_keys)) {
        die("Loop prevented. Accumulator: " . $accumulator . "\n");
    }
}
