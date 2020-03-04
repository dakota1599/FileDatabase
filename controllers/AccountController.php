<?php 

class AccountController extends Controller{

    public function signup(){

    }

    public function signin(){

    }


    private function View($fileName){
        require "views/$fileName.view.php";
    }

}


?>