<?php
/**
 * Входной файл
 */
require 'autoload.php';

// task one
echo "TASK ONE<br><br>\n";
$task_one_obj = new \TaskOne\Init();
$task_list_obj_arr = $task_one_obj->get();
/**
 * @var $task_obj TaskOne\ModelOne;
 */
foreach($task_list_obj_arr as $task_obj){
    echo $task_obj->getScriptName() . "<br>\n";
    echo $task_obj->getSortIndex() . "<br>\n";
    echo $task_obj->getResult() . "<br><br>\n\n";
}

// task two
echo "TASK TWO<br><br>\n";
require('TaskTwo/cli.php');
