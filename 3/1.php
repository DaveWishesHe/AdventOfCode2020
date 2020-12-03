<?php

include('../functions.php');

$data = array_filter(getInput());

$start_row = 0;
$current_row = 1;
$end_row = count($data) - 1;

$position = 0;

$map = [
    'O' => 0,
    'X' => 0,
];

$row_length = strlen($data[0]) - 1;

while ($current_row <= $end_row) {
    $position += 1;

    if ($position >= $row_length) {
        $position = $position - $row_length;
    }

    $key = ($data[$current_row][$position] === '.') ? 'O' : 'X';

    print $current_row . ': ' . $position . ' = ' . $key . "\n";

    $map[$key]++;
    $current_row++;
    $current_row++;
}

print_r($map);
