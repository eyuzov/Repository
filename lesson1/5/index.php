<?php
$a = 12;
$b = 54;

echo "a = {$a}, b = {$b} <br>";

$a = $b + $a -($b = $a + $b - $b);

echo "a = {$a}, b = {$b} <br>";

$b = $a ^ $b ;
$a = $b ^ $a;
$b = $a ^ $b;

echo "a = {$a}, b = {$b} <br>";
