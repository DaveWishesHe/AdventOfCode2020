<?php

function getInput($delimiter = "\n", $filename = 'input.txt')
{
    return explode($delimiter, trim(file_get_contents($filename)));
}
