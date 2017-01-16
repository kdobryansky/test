<?php
/**
 * Скрипт находит в папке datafiles все файлы с разрешением ixt и именем файла отвечающим требованиям: наличия буквы и цифры
 */

// glob по-умолчанию сортирует массив с именами файлов по имени
$file_names_arr = glob(__DIR__ . "/datafiles/[a-z]*.ixt");
foreach ($file_names_arr as $filename) {
    echo $filename . "<br>\n";
}
