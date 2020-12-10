<?php

include('../functions.php');

$data = getInput("\n\n", "input.txt");

$totals = [];

foreach ($data as $group) {

    $individuals = explode("\n", $group);

    $answers = [];

    // Where anyone answered.
    #foreach ($individuals as $individual) {
    #    $answers = array_merge($answers, str_split(trim($individual)));
    #}

    #$answers = array_unique($answers);
    #$totals[] = count($answers);

    // Where everyone answered.
    $individual_answers = [];

    foreach ($individuals as $individual) {
        $individual_answers[] = array_unique(str_split(trim($individual)));
    }

    $intersect = (count($individual_answers) === 1) ? $individual_answers[0] : call_user_func_array('array_intersect', $individual_answers);

    $totals[] = count($intersect);
}

print "Total: " . array_sum($totals) . "\n";
