<?php
    
    

    class HomeModel{

        public $data;
        public $recent_polls;
        //Requiring bootstrap setup
        public function __construct()
        {
            $this->data = require 'core/data.bootstrap.php';
        }

        //Loads the most recent 25 polls
        public function load_recent(){
            $this->recent_polls =
            $this->data->retrieve_all("Select * From Polls
            Sort UploadDate
            Limit 25;", "Poll");
        }
    }

?>