<?php

include('../functions.php');

$data = getInput("\n", 'input.txt');

$visited_keys = [];
$current_key = 0;
$accumulator = 0;

$modded_cmds = [];
$modded_already = false;

while (true) {
    list($cmd, $val) = explode(' ', $data[$current_key]);
    $visited_keys[] = $current_key;

    switch ($cmd) {
        case 'nop':
            // If we haven't attempted to mod this nop yet, and we haven't modded already in this loop...
            if (!in_array($current_key, $modded_cmds) && $modded_already === false) {
                // Do a jmp instead.
                $modded_cmds[] = $current_key;
                $current_key += (int)$val;
                $modded_already = true;
            } else {
                // Else nop.
                $current_key++;
            }

            break;
        case 'acc':
            $accumulator_orig = $accumulator;
            $accumulator += (int)$val;
            $current_key++;
            break;
        case 'jmp':
            // If we haven't attempted to mod this jmp yet, and we haven't modded already in this loop...
            if (!in_array($current_key, $modded_cmds) && $modded_already === false) {
                // Do a nop instead.
                $modded_cmds[] = $current_key;
                $current_key++;
                $modded_already = true;
            } else {
                // Else jmp.
                $current_key += (int)$val;
            }

            break;
        default:
            print "Invalid CMD! ($cmd)" . "\n";
            break;
    }

    if (in_array($current_key, $visited_keys)) {
        // If we're about to infinite loop, we changed the wrong nop or jmp, so reset everything and start over.
        print "Loop prevented. Resetting.\n";

        $visited_keys = [];
        $current_key = 0;
        $accumulator = 0;
        $modded_already = false;
    }

    if (!isset($data[$current_key])) {
        // If current_key (the next command we'd deal with) isn't set, we've arrived at the end of the instructions.
        die("THE END! " . $accumulator);
    }
}

function nop()
{
    global $current_key;

    $current_key++;
}

function jmp($val)
{
    global $current_key;


}
