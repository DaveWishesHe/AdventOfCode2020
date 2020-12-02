<?php

$data = explode("\n", trim(file_get_contents('input.txt')));

$numbers = [];
$last = count($data) - 1;

foreach ($data as $number) {
    $i = 0;

    while ($i <= $last) {
        if (($number + $data[$i]) === 2020) {
            echo($number * $data[$i]);
            die;
        }

        $i++;
    }
}

echo "Nothing found?";
