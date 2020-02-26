<?php 


class StaticPageController{

    public function home(){
        return $this->View("home");
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