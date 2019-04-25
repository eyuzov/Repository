<?php
include "main.php";
$id = (int)htmlspecialchars(strip_tags($_GET[id]));
$sql = "SELECT * FROM `images` WHERE `id` = " . $id;
$sql = mysqli_real_escape_string(getDb(), $sql);
$result = getAssocResult($sql);
$fileName = $result[0][path_big] . $result[0][name];

$count = $result[0][views_count];
++$count;
$sql = "UPDATE `images` SET `views_count`=$count WHERE `id` = " . $id;
$sql = mysqli_real_escape_string(getDb(), $sql);
executeQuery($sql);

$sql = "SELECT * FROM `feedback` WHERE `id_image` = " . $id;
$sql = mysqli_real_escape_string(getDb(), $sql);
$feedback = getAssocResult($sql);

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
<br>Views count = <?= $count ?>

<form action="addFeedback.php" method="post">
    <input type="hidden" name="image" value="<?= $id ?>">
    Name <input type="text" name="author"><br>
    Text <textarea name="text" id="" cols="120" rows="10"></textarea><br>
    <input type="submit">
</form>

<p>Feedbacks</p>
<?foreach ($feedback as $item): ?>
    <p>
        <b><?=$item['author']?>:</b> <?=$item['feedback_text']?><br>
    </p>
<?endforeach;?>
</body>
</html>
