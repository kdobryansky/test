<?php

/**
 * Синглтон класс для работы с БД
 *
 * Class DB
 */
class DB
{

    private static $db_instance = null;

    /**
     * Главный метод, возвращающий
     * @return null|PDO
     * @throws Exception
     */
    public static function getDB()
    {
        $db_handler = new PDO(\Constants::DB_CONNECTION_URL, \Constants::DB_USER_NAME, \Constants::DB_PASSWORD);
        self::$db_instance = $db_handler;
        return self::$db_instance;
    }

    /**
     * Основной метод, делающий запрос к БД
     *
     * @param $query
     * @param array $params_arr
     * @return PDOStatement
     * @throws Exception
     */
    public static function query($query, Array $params_arr = [])
    {
        $db_handler = self::getDB();
        if (!$db_handler) {
            throw new Exception('Error recieving DB');
        }

        $statement = $db_handler->prepare($query);
        if (!$statement->execute($params_arr)) {
            throw new Exception('Query execution failed');
        }
        return $statement;
    }

    /**
     * Хелпер метод, позволяющий сразу сконвертировать данные из БД в объекты заданного класса
     *
     * @param $query
     * @param array $params_arr
     * @param string $class_name Полное имя класса с неймспейсом
     * @return array
     * @throws Exception
     */
    public static function readIntoClassObjects($query, Array $params_arr = [], $class_name)
    {
        /**
         * @var $statement_obj PDOStatement;
         */
        $statement_obj = self::query($query, $params_arr);
        return $statement_obj->fetchAll(PDO::FETCH_CLASS, $class_name);
    }

}