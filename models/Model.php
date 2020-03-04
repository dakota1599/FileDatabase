<?php 

class Model{

    protected $data;

    public function __construct($db)
    {
        $this->data = $db;
    }

}


?>