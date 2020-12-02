<?php

$data = explode("\n", trim(file_get_contents('input.txt')));
$valid = 0;

foreach ($data as $row) {
    list($policy, $password) = explode(': ', $row);

    list($occurrences, $character) = explode(' ', $policy);

    list($min, $max) = explode('-', $occurrences);

    $matches = substr_count($password, $character);

    if ($matches >= $min && $matches <= $max) {
        $valid++;
    }
}

print $valid;
