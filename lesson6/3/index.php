<?php
include "main.php";


if (isset($_POST["load"])) {
    $size = $_FILES["myfile"]["size"];
    if ($size >= (1024 * 1024)) {
        echo("Файл не должен быть больше 1 Мб");
    } else {
        $fileName = $_FILES["myfile"]["name"];
        $path = $pathToBig . $fileName;
        if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $path)) {
            $sql = "INSERT INTO `images`(`name`, `path_small`, `path_big`, `size`, `views_count`) 
                    VALUES ('$fileName','$pathToSmall','$pathToBig',$size,0)";
            header("location: index.php");
            executeQuery($sql);
            closeDb();
            echo "Файл успешно загружен";
            resize($path, $pathToSmall, $fileName);


        } else {
            die("Error load file!");
        }
    }
}
$sql = "SELECT * FROM `images` order by `views_count` desc ;";
$imgs = getAssocResult($sql);
$block = "<div style='display: flex; flex-wrap: wrap'>";
foreach ($imgs as $item) {
    $block .= "<p>
<a href='image.php?id=$item[id]' target='_blank'>
<img src='$item[path_small]$item[name]' style= 'margin: 10px; height: 150px' ></a><br>
Views count = $item[views_count]
</p>";
}
$block .= "</div>";
echo $block;

?>


<form method="post" enctype="multipart/form-data">
    <input type="file" name="myfile" accept="image/jpeg, image/png, image/gif">
    <input type="submit" name="load">
</form>