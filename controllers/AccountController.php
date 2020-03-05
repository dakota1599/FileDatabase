<?php 
require 'models/account.model.php';
class AccountController extends Controller{


    public function signup(){
        if(Request::RequestMethod() == "POST"){

        }else{
            require $this->View("sign");
        }
    }

    public function signin(){
        if(Request::RequestMethod() == "POST"){

        }else{
            require $this->View("sign");
        }
    }

    //Verifies that a username is not already taken.  Collects the username in question.
    public function verify(){
        $user = $_GET['User'];
        $email = $_GET['Email'];
        $this->model = new AccountModel($this->data);
        echo $this->model->check_username($user);

        //Checks to see if the email is correctly formatted.
        if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $email)) {
            $email = "false";
        }else{
            $email = "true";
        }

        //Returns both answers in a comma delimitted fashion.
        echo $user.",".$email;
    }


}


?>