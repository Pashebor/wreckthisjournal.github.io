<?php



class Delete {

    public $table;
    public $id;

    /**
     * @param mixed $id
     */
    public function setId($stringId)
    {
        $this->id = $stringId;
    }

    /**
     * @param mixed $table
     */
    public function setTable($stringTable)
    {
        $this->table = $stringTable;
    }




    function delete(){

           return  mysql_query("delete from $this->table where id = '$this->id'");
    }

} 