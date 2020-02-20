<?php 


class StaticPageController{

    public function home(){
    }

    public function about(){
    }

    public function contact(){
       
    }


    protected function View($fileName){
	require 'views/$fileName.view.php';
    }




}

?>