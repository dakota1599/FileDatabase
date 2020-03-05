<?php 

class Controller{

    protected $data;
    protected $model;
    public function __construct($db)
    {
        $this->data = $db;
    }

    //View Method
    protected function View($fileName){
        return "views/$fileName.view.php";
    }

    //For validating use login in all controllers.
    protected function Validate(){
        if($_SESSION['validated']){
            return true;
        }
        return false;
    }

}


?>