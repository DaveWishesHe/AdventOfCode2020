<?php

include('../functions.php');

$data = getInput("\n\n", 'input.txt');

function isValid($passport)
{
    $valid_passport = ['byr', 'iyr', 'eyr', 'hgt', 'hcl', 'ecl', 'pid']; // Note: cid removed ;)

    if (array_diff_key(array_flip($valid_passport), $passport)) {
        return false;
    }

    if (strlen($passport['byr']) > 4 || !is_numeric($passport['byr']) || $passport['byr'] < 1920 || $passport['byr'] > 2002) {
        return false;
    }

    if (strlen($passport['iyr']) > 4 || !is_numeric($passport['iyr']) || $passport['iyr'] < 2010 || $passport['iyr'] > 2020) {
        return false;
    }

    if (strlen($passport['eyr']) > 4 || !is_numeric($passport['eyr']) || $passport['eyr'] < 2020 || $passport['eyr'] > 2030) {
        return false;
    }

    $unit = substr($passport['hgt'], -2);
    if (!in_array($unit, ['cm', 'in'])) {
        return false;
    }

    $measurement = substr($passport['hgt'], 0, -2);

    if (!is_numeric($measurement)) {
        return false;
    }

    if ($unit === 'cm' && ($measurement < 150 || $measurement > 193)) {
        return false;
    }

    if ($unit === 'in' && ($measurement < 59 || $measurement > 76)) {
        return false;
    }

    $hex = $passport['hcl'][0];
    if ($hex !== '#') {
        return false;
    }

    $color = substr($passport['hcl'], 1);
    if (strlen($color) !== 6) {
        return false;
    }

    if (ctype_xdigit($color) === false) {
        return false;
    }

    if (!in_array($passport['ecl'], ['amb', 'blu', 'brn', 'gry', 'grn', 'hzl', 'oth'])) {
        return false;
    }

    if (strlen($passport['pid']) !== 9 || ctype_digit($passport['pid']) === false) {
        return false;
    }

    return true;
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

