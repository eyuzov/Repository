 <?php
include "main.php";
$sql = "SELECT * FROM `images` WHERE `id` = $_GET[id]";
$sql = mysqli_real_escape_string(getDb(), $sql);
$result = getAssocResult($sql);
$fileName = $result[0][path_big] . $result[0][name];

$count = $result[0][views_count];
++$count;
$sql = "UPDATE `images` SET `views_count`=$count WHERE `id` = $_GET[id]";
$sql = mysqli_real_escape_string(getDb(), $sql);
executeQuery($sql);

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
<img src=<?= $fileName ?> alt="">
Views count = <?= $count ?>


</body>
</html>
