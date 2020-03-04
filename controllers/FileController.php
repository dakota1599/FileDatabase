<?php 
require 'models/file.model.php';

class FileController extends Controller{

    protected $model;

    //Method for file upload
    public function upload(){
        $this->model = new FileModel($this->data);
        $result = $this->model->upload();
        require $this->View("upload");
    } 

    //View Method
    protected function View($fileName){
        return "views/$fileName.view.php";
    }

}


?>