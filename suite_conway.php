#!/usr/bin/php
<?php

$R = $argv[1];
$L = $argv[2];
$count = 1;
$tab_input = array($R);
$tab_output = array();
function next_nb(array $tab_input)
{
    global $tab_output;
    $tab_output = array();
    $i = 0;
    while ($i < count($tab_input) - 1) {
        $nb = 1;
        if (strcmp($tab_input[$i], $tab_input[$i + 1]) == 0) {
            while (($i < count($tab_input) - 1) && (strcmp($tab_input[$i], $tab_input[$i + 1]) == 0)) {
                $nb++;
                $i++;
            }
            array_push($tab_output, $nb, $tab_input[$i - 1]);
        } else {
            array_push($tab_output, 1, $tab_input[$i]);
        }
        $i++;
    }
    if ($i == count($tab_input) - 1) {
        array_push($tab_output, 1, $tab_input[$i]);
    }
    global $count;
    global $L;
    if ($count < $L - 1) {
        $count++;
        next_nb($tab_output);
    }
}

if ($L > 1) {
    next_nb($tab_input);
} else {
    array_push($tab_output, $R);
}
$rtn = implode(" ", $tab_output);
echo $rtn;
?>