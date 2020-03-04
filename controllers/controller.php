<?php 

class Controller{

    protected $data;
    public function __construct($db)
    {
        $this->data = $db;
    }

}


?>