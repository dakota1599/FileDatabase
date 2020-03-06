<?php 


class FileController extends Controller{


    //Method for file upload
    public function upload(){
        $this->model = new FileModel($this->data);
        $result = $this->model->upload();
        header("Location: /");
    }
    
    //Collects info and directs to the delete function of the model.
    public function delete(){
        $this->model = new FileModel($this->data);
        $this->model->delete($_GET['ID']);
    }

    

}


?>