<?php

namespace TaskOne;

/**
 * Генератор случайных данных для таблицы
 *
 * Class RandomDataGenerator
 * @package TaskOne
 */
class RandomDataGenerator
{

    /**
     * Возвращает случайное имя скрипта длиной в 25 символов (вместе с расширением)
     *
     * @return string
     */
    public static function generateScriptName()
    {
        $random_string = md5(uniqid(time(), true));
        $stripped_random_string = substr($random_string, 0, 21);
        return $stripped_random_string . '.php';
    }

    /**
     * Возвращает случайное числовое значение от 1 до 999
     *
     * @return int
     */
    public static function generateSortIndex()
    {
        return rand(1, 999);
    }

    /**
     * Возвращает один из вариантов строки
     *
     * @return mixed
     */
    public static function getRandomResultString()
    {
        $result_values_arr = ['normal', 'illegal', 'failed', 'success'];
        $random_array_key_value = array_rand($result_values_arr);
        return $result_values_arr[$random_array_key_value];
    }

}