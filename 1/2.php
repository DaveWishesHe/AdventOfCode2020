<?php

$data = explode("\n", trim(file_get_contents('input.txt')));

$numbers = [];
$last = count($data) - 1;

foreach ($data as $number) {
    $i = 0;

    while ($i <= $last) {
        $i2 = 0;

        while ($i2 <= $last) {
            if (($number + $data[$i] + $data[$i2]) === 2020) {
                echo ($number * $data[$i] * $data[$i2]);

                die;
            }

            $i2++;
        }

        $i++;
    }
}

echo "Nothing found?";
