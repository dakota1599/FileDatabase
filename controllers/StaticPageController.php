<?php


class StaticPageController extends Controller{

    public function home(){
        $data = new HomeModel($this->data);
        $data->load_files();
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