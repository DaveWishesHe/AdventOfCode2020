<?php

include('../functions.php');

$data = getInput();

$start_row = 0;
$current_row = 1;
$end_row = count($data) - 1;

$position = 0;

$maps = [];

$row_length = strlen($data[0]);

$slopes = [
    [1, 1],
    [3, 1],
    [5, 1],
    [7, 1],
    [1, 2],
];

foreach ($slopes as $key => $slope) {
    $position = 0;
    $current_row = $slope[1];
    $maps[$key] = [
        'O' => 0,
        'X' => 0,
    ];

    while ($current_row <= $end_row) {
        $position += $slope[0];

        if ($position >= $row_length) {
            $position = $position - $row_length;
        }

        $open_or_tree = ($data[$current_row][$position] === '.') ? 'O' : 'X';

        print $current_row . ': ' . $position . ' = ' . $open_or_tree . "\n";

        $maps[$key][$open_or_tree]++;
        $current_row += $slope[1];
    }
}

$total = $maps[0]['X'] * $maps[1]['X'] * $maps[2]['X'] * $maps[3]['X'] * $maps[4]['X']; # 6708199680

print_r($maps);
print "\n";
print $total . "\n";
