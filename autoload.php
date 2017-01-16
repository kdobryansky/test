<?php
/**
 * Файл автозагрузчика
 */

/**
 * Переопределяющий метод автозагрузчика для работы приложения
 */
spl_autoload_register(function ($full_classname) {
    $full_classname = str_replace("\\", '/', $full_classname);
    include __DIR__ . DIRECTORY_SEPARATOR . $full_classname . '.php';
});