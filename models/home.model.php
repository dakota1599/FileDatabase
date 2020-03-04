<?php
    

    class HomeModel extends Model{

        public $files;

        //Loads the most recent 25 polls
        public function load_files(){
            $this->files = $this->data->retrieve_all("Select Title, Size, ID From Files", "File");
        }
    }

?>