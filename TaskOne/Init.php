<?php

namespace TaskOne;

/**
 * Class Init
 */
final class Init
{

    /**
     * При инициализации таблица создается и заполняется данными
     * Init constructor.
     */
    public function __construct()
    {
        $this->create();
        $this->fill();
    }

    /**
     * Создаем таблицу заданной структуры, описанной во внешнем файле
     */
    private function create()
    {
        $mysql_schema_string = file_get_contents(\Constants::DATABASE_FILE_SCHEMA);
        \DB::query($mysql_schema_string);
    }

    /**
     * Заполняем нашу таблицу тестовыми данными
     */
    private function fill()
    {
        $iterations_count = rand(5, 50);
        for($i=0;$i<$iterations_count;$i++){
            $model_obj = new ModelOne();
            $model_obj->setScriptName(RandomDataGenerator::generateScriptName());
            $model_obj->setSortIndex(RandomDataGenerator::generateSortIndex());
            $model_obj->setResult(RandomDataGenerator::getRandomResultString());
            $model_obj->save();
        }
    }

    /**
     * Выбирает из таблицы все данные по полю result
     */
    public function get()
    {
        return \DB::readIntoClassObjects('SELECT * FROM ' . ModelOne::TABLE_NAME . ' WHERE result IN ("normal", "success")', [], '\TaskOne\ModelOne');
    }

    /**
     * Просто так )
     */
    public function __destruct()
    {
        echo 'done';
    }

}