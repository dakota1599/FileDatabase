<?php 

class Controller{

    protected $data;
    public function __construct($db)
    {
        $this->data = $db;
    }

    //View Method
    protected function View($fileName){
        return "views/$fileName.view.php";
    }

}


?>