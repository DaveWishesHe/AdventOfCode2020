<?php

include('../functions.php');

$data = getInput("\n", 'input.txt');

$lower_row = 0;
$upper_row = 127;
$lower_column = 0;
$upper_column = 7;

$seat_ids = [];

foreach ($data as $location) {
    $row = substr(trim($location), 0, -3);
    $col = substr(trim($location), -3);

    for ($i = 0; $i < strlen($row); $i++) {
        $mid_point_row = ceil(($lower_row + $upper_row) / 2);
        if ($row[$i] === 'F') {
            $upper_row = $mid_point_row;
        } elseif ($row[$i] === 'B') {
            $lower_row = $mid_point_row;
        }
    }

    // One more to get the final number.
    $mid_point_row = floor(($lower_row + $upper_row) / 2);

    for ($i = 0; $i < strlen($col); $i++) {
        $mid_point_col = ceil(($lower_column + $upper_column) / 2);

        if ($col[$i] ==='R') {
            $lower_column = $mid_point_col;
        } elseif ($col[$i] === 'L') {
            $upper_column = $mid_point_col;
        }
    }

    // One more to get the final number.
    $mid_point_col = floor(($lower_column + $upper_column) / 2);

    $seat_ids[] = (($mid_point_row * 8) + $mid_point_col);

    $lower_row = 0;
    $upper_row = 127;
    $lower_column = 0;
    $upper_column = 7;
}

# Part 1:
print max($seat_ids) . "\n";

# Part 2:
sort($seat_ids);
$counter = 70;

foreach ($seat_ids as $id) {
    if ($id != $counter) {
        print "Seat ID: " . $counter . "\n";
        die();
    }

    $counter++;
}
