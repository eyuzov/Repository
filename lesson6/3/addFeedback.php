<?php
include "main.php";
$feedbackAuthor = (string)htmlspecialchars(strip_tags($_POST['author']));
$feedbackText = (string)htmlspecialchars(strip_tags($_POST['text']));

$sql = "INSERT INTO `feedback`(`author`, `feedback_text`, `id_image`) VALUES ('$feedbackAuthor', '$feedbackText', $_POST[image])";

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
<a href='image.php?id=<?=$_POST[image]?>'>Назад</a>
</body>
</html>