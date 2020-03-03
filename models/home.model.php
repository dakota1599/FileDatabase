<?php
    
    

    class HomeModel{

        public $data;

        public $files;
        //Requiring bootstrap setup
        public function __construct()
        {
            $this->data = require 'core/data.bootstrap.php';
            $this->load_files();
        }

        //Loads the most recent 25 polls
        public function load_files(){
            $this->files = $this->data->retrieve_all("Select * From Files", "Files");
        }
    }

?>