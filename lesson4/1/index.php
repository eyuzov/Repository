<?php

if (isset($_POST["load"])) {
    if ($_FILES["myfile"]["size"] >= (1024 * 1024)) {
        echo ("Файл не должен быть больше 1 Мб");
    } else {
        $path = "img/" . $_FILES["myfile"]["name"];
        if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $path))
            "Файл успешно загружен";
        else die("Error load file!");
    }
}

$imgs = scandir("img");
$imgs = array_slice($imgs, 2);
$block = "<div style='display: flex; flex-wrap: wrap'>";
foreach ($imgs as $item) {
    $block .= "<a href='img/$item' target='_blank'><img src='img/$item' style='height: 20%; margin: 10px' ></a>";
}
$block .= "</div>";
echo $block;

?>


<form method="post" enctype="multipart/form-data">
    <input type="file" name="myfile" accept="image/jpeg, image/png, image/gif">
    <input type="submit" name="load">
</form>























