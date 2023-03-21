<?php

$low_letters = 'abcdefghilmnopqrstuvzxywkj';
$up_letters = strtoupper($low_letters);
$numbers = '0123456789';
$symbols = '?!%&$£';

function generateRndPsw($num_input, $low_letters, $up_letters, $numbers, $symbols)
{
    $rndPsw = [];
    for ($i = 0; $i < $num_input; $i++) {

        $rndChoice = rand(0, 3);
        if ($rndChoice === 0) {
            $rndIndex = rand(0, (strlen($low_letters) - 1));
            $rndPsw[] = $low_letters[$rndIndex];
        }
        if ($rndChoice === 1) {
            $rndIndex = rand(0, (strlen($up_letters) - 1));
            $rndPsw[] = $up_letters[$rndIndex];
        }
        if ($rndChoice === 2) {
            $rndIndex = rand(0, (strlen($numbers) - 1));
            $rndPsw[] = $numbers[$rndIndex];
        }
        if ($rndChoice === 3) {
            $rndIndex = rand(0, (strlen($symbols) - 1));
            $rndPsw[] = $symbols[$rndIndex];
        }
    };

    return $rndPsw;
};
