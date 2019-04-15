<?php
$path = "img/";

if (isset($_POST["load"])) {
    if ($_FILES["myfile"]["size"] >= (1024 * 1024)) {
        echo("Файл не должен быть больше 1 Мб");
    } elseif ($_FILES["myfile"]["type"] != "image/jpeg" && $_FILES["myfile"]["type"] != "image/png") {
        echo("Файл должен быть в формате JPEG\PNG");
    } else {
        $fileName = $path . $_FILES["myfile"]["name"];
        if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $fileName))
            echo "Файл успешно загружен";
        else die("Error load file!");
    }
}

$imgs = scandir($path);
$imgs = array_slice($imgs, 2);
$block = "<div>";
foreach ($imgs as $item) {
    $block .= "<a href='$path$item' target='_blank'><img src='$path$item' style='height: 20%; margin: 10px' ></a>";
}
$block .= "</div>";
echo $block;

?>


<form method="post" enctype="multipart/form-data">
    <input type="file" name="myfile" accept="image/jpeg, image/png">
    <input type="submit" name="load">
</form>























