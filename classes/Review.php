<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 03.09.15
 * Time: 18:17
 */

class Review {

    public $answer;
    public $table;
    public $answered;
    public $id;

    /**
     * @param mixed $answered
     */
    public function setAnswered($answered)
    {
        $this->answered = $answered;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $table
     */
    public function setTable($table)
    {
        $this->table = $table;
    }


    /**
     * @param mixed $answer
     */
    public function setAnswer($stringAnswer)
    {
        $this->answer = $stringAnswer;
    }

    function approve(){
        return mysql_query("update $this->table set answered = '$this->answered' , answer = '$this->answer' where id = '$this->id'");
    }
} 