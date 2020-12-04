<?php

include('../functions.php');

$data = getInput("\n\n", 'input.txt');

function isValid($passport)
{
    $valid_passport = ['byr', 'iyr', 'eyr', 'hgt', 'hcl', 'ecl', 'pid']; // Note: cid removed ;)

    return !array_diff_key(array_flip($valid_passport), $passport);
}

$valid_passports = 0;

foreach ($data as $row) {
    $row = str_replace("\n", ' ', $row);
    $parts = explode(' ', $row);
    $passport = [];
    foreach ($parts as $item) {
        list($key, $value) = explode(':', $item);
        $passport[$key] = $value;
    }

    if (isValid($passport)) {
        $valid_passports++;
    }
}

print $valid_passports . "\n";

