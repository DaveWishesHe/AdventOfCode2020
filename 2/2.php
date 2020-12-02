<?php

$data = explode("\n", trim(file_get_contents('input.txt')));
$valid = 0;

foreach ($data as $row) {
    list($policy, $password) = explode(': ', $row);
    list($occurrences, $character) = explode(' ', $policy);
    list($min, $max) = explode('-', $occurrences);

    $pos1 = $min - 1;
    $pos2 = $max - 1;

    if (
        ($password[$pos1] === $character && $password[$pos2] !== $character) ||
        ($password[$pos1] !== $character && $password[$pos2] === $character)
    ) {
        $valid++;
    }
}

print $valid;
