<?php

namespace TaskOne;

/**
 * Основная модель первой задачи
 *
 * Class ModelOne
 * @package TaskOne
 */
class ModelOne
{

    const TABLE_NAME = 'test';

    private $id;
    private $script_name;
    private $start_time;
    private $sort_index;
    private $result;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getScriptName()
    {
        return $this->script_name;
    }

    /**
     * @param mixed $script_name
     */
    public function setScriptName($script_name)
    {
        $this->script_name = $script_name;
    }

    /**
     * @return mixed
     */
    public function getStartTime()
    {
        return $this->start_time;
    }

    /**
     * @param mixed $start_time
     */
    public function setStartTime($start_time)
    {
        $this->start_time = $start_time;
    }

    /**
     * @return mixed
     */
    public function getSortIndex()
    {
        return $this->sort_index;
    }

    /**
     * @param mixed $sort_index
     */
    public function setSortIndex($sort_index)
    {
        $this->sort_index = $sort_index;
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param mixed $result
     */
    public function setResult($result)
    {
        $this->result = $result;
    }

    /**
     * Метод сохраняющий данные модели в БД
     *
     * @throws \Exception
     */
    public function save()
    {
        \DB::query('INSERT INTO ' . self::TABLE_NAME . ' (script_name, sort_index, result) VALUES (?, ?, ?)', [$this->getScriptName(), $this->getSortIndex(), $this->getResult()]);
    }

}