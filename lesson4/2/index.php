<?php
$pathToSmall = "img/small/";
$pathToBig = "img/big/";


if (isset($_POST["load"])) {
    if ($_FILES["myfile"]["size"] >= (1024 * 1024)) {
        echo("Файл не должен быть больше 1 Мб");
    } elseif ($_FILES["myfile"]["type"] != "image/jpeg" && $_FILES["myfile"]["type"] != "image/png") {
        echo("Файл должен быть в формате JPEG\PNG");
    } else {
        $name = $_FILES["myfile"]["name"];
        $path = $pathToBig . $name;
        if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $path)) {
            echo "Файл успешно загружен";
            resize($name, $pathToSmall, $pathToBig);
        } else {
            die("Error load file!");
        }
    }
}

function resize($name, $pathToSmall, $pathToBig)
{
    $type = mime_content_type($pathToBig . $name);
    $size = GetImageSize($pathToBig . $name);
//Создаём новое изображение из «старого»
    switch ($type) {
        case "image/jpeg":
            $src = ImageCreateFromJPEG($pathToBig . $name);
            break;
        case "image/png":
            $src = imagecreatefrompng($pathToBig . $name);
            break;
    }
//Берём числовое значение ширины фотографии, которое мы получили в первой строке и записываем это число в переменную
    $iw = $size[0];
//Проделываем ту же операцию, что и в предыдущей строке, но только уже с высотой.
    $ih = $size[1];
//Ширину фотографии делим на 150 т.к. на выходе мы хотим получить фото шириной в 150 пикселей. В результате получаем коэфициент соотношения ширины оригинала с будущей превьюшкой.
    $koe = $iw / 150;
//Делим высоту изображения на коэфициент, полученный в предыдущей строке, и округляем число до целого в большую сторону — в результате получаем высоту нового изображения.
    $new_h = ceil($ih / $koe);
//Создаём пустое изображение шириной в 150 пикселей и высотой, которую мы вычислили в предыдущей строке.
    $dst = ImageCreateTrueColor(150, $new_h);
//Данная функция копирует прямоугольную часть изображения в другое изображение, плавно интерполируя пикселные значения таким образом, что, в частности, уменьшение размера изображения сохранит его чёткость и яркость.
    ImageCopyResampled($dst, $src, 0, 0, 0, 0, 150, $new_h, $iw, $ih);
//Сохраняем полученное изображение в формате JPG
    ImageJPEG($dst, $pathToSmall . $name, 100);

    imagedestroy($src);
}


$imgs = scandir($pathToSmall);
$imgs = array_slice($imgs, 2);
$block = "<div>";
foreach ($imgs as $item) {
    $block .= "<a href='$pathToBig$item' target='_blank'><img src='$pathToSmall$item' style= 'margin: 10px; height: 150px' ></a>";
}
$block .= "</div>";
echo $block;

?>


<form method="post" enctype="multipart/form-data">
    <input type="file" name="myfile" accept="image/jpeg, image/png">
    <input type="submit" name="load">
</form>