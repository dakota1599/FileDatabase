<?php
    require 'models/home.model.php'; 

class StaticPageController{

    public function home(){

        if($_SESSION['Validation']){
            $data = new HomeModel();
        }
        require $this->View("home");
    }

    public function about(){
    }

    public function contact(){
       
    }


    protected function View($fileName){
	    return "views/$fileName.view.php";
    }




}

?>