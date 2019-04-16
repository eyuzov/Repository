<?php
//1. С помощью цикла while вывести все числа в промежутке от 0 до 100, которые делятся на 3 без остатка.
$a = 0;
while ($a <= 100) {
    if ($a % 3 == 0) {
        echo "{$a}<br>";
    }
    $a++;
}
echo "<br><hr><br>";
//***************************************************************************************************
//2. С помощью цикла do…while написать функцию для вывода чисел от 0 до 10

$b = 0;
do {
    if ($b == 0) {
        echo "{$b} - это ноль<br>";
    } elseif ($b & 1) {
        echo "{$b} - нечетное число<br>";
    } else {
        echo "{$b} - четное число<br>";
    }
    $b++;
} while ($b <= 10);
echo "<br><hr><br>";
//***************************************************************************************************
//3. Объявить массив, в котором в качестве ключей будут использоваться названия областей,
// а в качестве значений – массивы с названиями городов из соответствующей области.
// Вывести в цикле значения массива

$arr = [
    "Московская область" => ["Москва", "Зеленоград", "Клин"],
    "Ленинградская область" => ["Санкт-Петербург", "Всеволожск", "Павловск", "Кронштадт"],
];

foreach ($arr as $key => $value) {
    echo "<br>{$key}: <br>";
    for ($i = 0; $i < count($value); $i++) {
        echo $i < count($value) - 1 ? $value[$i] . ", " : $value[$i];
    }
};

echo "<br><hr><br>";

//***************************************************************************************************
//4. ВАЖНОЕ1. Объявить массив, индексами которого являются буквы русского языка,
// а значениями – соответствующие латинские буквосочетания
//Написать функцию транслитерации строк.

function translit($str) {
    $alfabet = [
        'а' => 'a', 'б' => 'b', 'в' => 'v',
        'г' => 'g', 'д' => 'd', 'е' => 'e',
        'ё' => 'e', 'ж' => 'zh', 'з' => 'z',
        'и' => 'i', 'й' => 'y', 'к' => 'k',
        'л' => 'l', 'м' => 'm', 'н' => 'n',
        'о' => 'o', 'п' => 'p', 'р' => 'r',
        'с' => 's', 'т' => 't', 'у' => 'u',
        'ф' => 'f', 'х' => 'h', 'ц' => 'c',
        'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch',
        'ь' => '\'', 'ы' => 'y', 'ъ' => '\'',
        'э' => 'e', 'ю' => 'yu', 'я' => 'ya'
    ];
    $finalString = "";

    for ($i = 0; $i < mb_strlen($str); $i++) {
        $smbl = mb_substr($str, $i, 1);
        if (mb_strtolower($smbl) != $smbl) {
            $finalString .= mb_strtoupper($alfabet[mb_strtolower($smbl)]);
        } else if ($alfabet[$smbl] == "") {
            $finalString .= $smbl;
        } else $finalString .= $alfabet[$smbl];
    }

    return $finalString;
}

$str = "йцуПривет!)(*&^%$#@! ВАП";
echo translit($str);


echo "<br><hr><br>";

//***************************************************************************************************
//5. Написать функцию, которая заменяет в строке пробелы на подчеркивания
// и возвращает видоизмененную строчку.

function replace($str) {
    $str1 = "";
    for ($i = 0; $i < strlen($str); $i++) {
        $char = $str[$i];
        if ($char == " ") {
            $char = "_";
        }
        $str1 .= $char;
    }
    return $str1;
}

$str = "вПривет! erer er ttr rtrtr";
echo replace($str);

echo "<br><hr><br>";
//***************************************************************************************************
//6. ВАЖНОЕ2.В имеющемся шаблоне сайта заменить статичное меню (ul – li) на генерируемое через PHP.
// Необходимо представить пункты меню как элементы массива и вывести их циклом.
// Подумать, как можно реализовать меню с вложенными подменю?
// Попробовать его реализовать, при желании на движке 3.

//<ul>
//	<li><a href='#'>Меню1</a></li>
//	<li><a href='#'>Меню2</a></li>
//	<li><a href='#'>Меню3</a></li>
//	<li><a href='3'>Меню4</a></li>
//</ul>
$menu = [
    "Меню1",
    "Меню2",
    [
        "SubMenu1",
        "SubMenu2",
        [
            "SubSubMenu1",
            "SubSubMenu2",
            "SubSubMenu3",
        ],
        "SubMenu3"
    ],
    "Меню3",
    "Меню4"
];
function render($menu) {
    $varMenu = "<ul>";
    for ($i = 0; $i < count($menu); $i++) {
        if (is_array($menu[$i])) {
            $varMenu .= render($menu[$i]);
        } else {
            $varMenu .= "<li>{$menu[$i]}</li>";
        }
    }
    $varMenu .= "</ul>";
    return $varMenu;
}

echo render($menu);


echo "<br><hr><br>";
//***************************************************************************************************
//7. *Вывести с помощью цикла for числа от 0 до 9, не используя тело цикла

for ($q = 0; $q < 10; print_r($q++ . "<br>")) ;

echo "<br><hr><br>";
//***************************************************************************************************
//9. *Объединить две ранее написанные функции в одну, которая получает строку на русском языке,
// производит транслитерацию и замену пробелов на подчеркивания
// (аналогичная задача решается при конструировании url-адресов на основе названия статьи в блогах).

function translit2($str) {
    $alfabet = [
        'а' => 'a', 'б' => 'b', 'в' => 'v',
        'г' => 'g', 'д' => 'd', 'е' => 'e',
        'ё' => 'e', 'ж' => 'zh', 'з' => 'z',
        'и' => 'i', 'й' => 'y', 'к' => 'k',
        'л' => 'l', 'м' => 'm', 'н' => 'n',
        'о' => 'o', 'п' => 'p', 'р' => 'r',
        'с' => 's', 'т' => 't', 'у' => 'u',
        'ф' => 'f', 'х' => 'h', 'ц' => 'c',
        'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch',
        'ь' => '\'', 'ы' => 'y', 'ъ' => '\'',
        'э' => 'e', 'ю' => 'yu', 'я' => 'ya'
    ];
    $finalString = "";

    for ($i = 0; $i < mb_strlen($str); $i++) {
        $smbl = mb_substr($str, $i, 1);
        if (mb_strtolower($smbl) != $smbl) {
            $finalString .= mb_strtoupper($alfabet[mb_strtolower($smbl)]);
        } else if ($alfabet[$smbl] == "") {
            if ($smbl == " ") {
                $finalString .= "_";
            } else $finalString .= $smbl;
        } else $finalString .= $alfabet[$smbl];
    }

    return $finalString;
}

$str = "йцуПривет! В А П ";
echo translit2($str);


echo "<br><hr><br>";





















