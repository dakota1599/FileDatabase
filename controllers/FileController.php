<?php 
require 'models/file.model.php';

class FileController{

    protected $model;

    //Method for file upload
    public function upload(){
        $this->model = new FileModel();
        $this->model->upload();
        $home = new StaticPageController();
        $home->home();
    } 

    //Method for file download
    public function download(){

    }

    //View Method
    protected function View($fileName){
        return "views/$fileName.view.php";
    }

}


?>