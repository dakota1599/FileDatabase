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
    
    //Collects info and directs to the delete function of the model.
    public function delete(){
        $this->model = new FileModel($this->data);
        $this->model->delete($_GET['ID']);
    }

    //View Method
    protected function View($fileName){
        return "views/$fileName.view.php";
    }

}


?>