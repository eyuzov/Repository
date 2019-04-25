<?php

if (isset($_POST)) {
    $var1 = $_POST['var1'];
    $var2 = $_POST['var2'];
    $operation = $_POST['operation'];
    $result = mathOperation($var1, $var2, $operation);
}

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
        echo("На ноль делить нельзя");
    } else {
        return $x / $y;
    }
}

function mathOperation($arg1, $arg2, $operation) {
    switch ($operation) {
        case "+":
            return sum($arg1, $arg2);
            break;
        case "-":
            return subt($arg1, $arg2);
            break;
        case "*":
            return mult($arg1, $arg2);
            break;
        case "/":
            return div($arg1, $arg2);
            break;
    }
}


?>

    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
    <form action="" method="post">
        <input type="text" name="var1" value="<?= $var1 ?>">
        <button name="operation" value="+">+</button>
        <button name="operation" value="-">-</button>
        <button name="operation" value="*">*</button>
        <button name="operation" value="/">/</button>
        <input type="text" name="var2" value="<?= $var2 ?>">
        Result = <input type="text" name="result" value="<?= $result ?>">
    </form>
    </body>
    </html>
<?php
/**
 * Created by PhpStorm.
 * User: ralf
 * Date: 25.04.2019
 * Time: 12:55
 */