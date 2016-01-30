<?php


class Approve {
    public $table;
    public $answered;
    public $id;

    /**
     * @param mixed $answered
     */
    public function setAnswered($stringAnswered)
    {
        $this->answered = $stringAnswered;
    }

    /**
     * @param mixed $id
     */
    public function setId($stingId)
    {
        $this->id = $stingId;
    }

    /**
     * @param mixed $table
     */
    public function setTable($stringTable)
    {
        $this->table = $stringTable;
    }

    function approve(){
        return mysql_query("update $this->table set answered = '$this->answered' where id = '$this->id'");
    }
} 