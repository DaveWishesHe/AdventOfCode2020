<?php

function getInput()
{
    return explode("\n", trim(file_get_contents('input.txt')));
}
