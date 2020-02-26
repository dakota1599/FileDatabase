<?php
    
    

    class HomeModel{

        public $data;
        //Requiring bootstrap setup
        public function __construct()
        {
            $this->data = require 'core/data.bootstrap.php';
        }
    }

?>