<?php

$a = rand(-10, 10);
$b = rand(-10, 10);

if ($a >= 0 && $b >= 0) {
    echo "a = {$a}, b = {$b}; a - b = " . $c = $a - $b;
} elseif ($a < 0 && $b < 0) {
    echo "a = {$a}, b = {$b}; a * b = " . $c = $a * $b;
} elseif (($a >= 0 && $b < 0) || ($a < 0 && $b >= 0)) {
    echo "a = {$a}, b = {$b}; a + b = " . $c = $a + $b;
}