<?php


function generateRndPsw($num_input, $chars, $doublesCheck)
{
    if ($num_input !== 0) {
        $rndPsw = '';
        while (strlen($rndPsw) < $num_input) {

            $rndIndex = rand(0, (strlen($chars) - 1));

            if ($doublesCheck === 'off') {
                if (!str_contains($rndPsw, $chars[$rndIndex])) {
                    $rndPsw .= $chars[$rndIndex];
                }
            } else {
                $rndPsw .= $chars[$rndIndex];
            }
        };
    }

    return $rndPsw;
};
