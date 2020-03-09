<?php
    

    class HomeModel extends Model{

        public $files;

        //Loads the most recent 25 polls
        public function load_files(){
            $user = $_SESSION['user'];
            $this->files = $this->data->retrieve_all("Select Title, Size, ID, UploadDate From Files
            Where UName = '$user' Order by UploadDate Desc;", "File");
        }
    }

?>