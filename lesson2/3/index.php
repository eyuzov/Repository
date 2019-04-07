<?php

$a = 3;
$b = 8;

function sum($x, $y) {
    return $x + $y;
}

function subt($x, $y) {
    return $x - $y;
}

function mult($x, $y) {
    return $x * $y;
}

function div($x, $y) {
    if ($y == 0) {
        return
        echo "На ноль делить нельзя";
    } else {
        return $x / $y;
    }
}
