<?php 

class AccountController extends Controller{


    public function signup(){
        if(Request::RequestMethod() == "POST"){
            $email = strtolower($_POST['email']);
            $user = strtolower($_POST['user']);
            $pass = $_POST['pass'];

            $this->model = new AccountModel($this->data);
            //If true, then the system will set the session variables and route the user to the account page.
            if($this->model->add_user($email,$user,$pass)){
                $_SESSION['email'] = $email;
                $_SESSION['user'] = $user;
                $_SESSION['pass'] = $pass;
                $_SESSION['auth'] = 1;
                $_SESSION['validated'] = true;
                header("Location: /");
            }
        }else{
            require $this->View("sign");
        }
    }

    public function signin(){
        if(Request::RequestMethod() == "POST"){
            $user = strtolower($_POST['user']);
            $pass = $_POST['pass'];
            $dest = $_POST['dest'];

            $this->model = new AccountModel($this->data);

            $account = $this->model->signin($user, $pass);

            //Validates the record for the last time.
            if($user == $account[0]->UName && $pass == $account[0]->Pass){
                
                //Sets the session variables.
                $_SESSION['email'] = $account[0]->Email;
                $_SESSION['user'] = $account[0]->UName;
                $_SESSION['pass'] = $account[0]->Pass;
                $_SESSION['auth'] = $account[0]->AuthLevel;
                $_SESSION['validated'] = true;
                if($dest != ""){
                    header("Location: /$dest");
                }else{
                    header("Location: /");
                }
            }else{
                //Presents error message back on the signin page in case the info doesn't pass validation.
                $error = "Username or password is incorrect.";
                require $this->View("sign");
            }

        }else{
            require $this->View("sign");
        }
    }

    //Verifies that a username is not already taken.  Collects the username in question.
    public function verify(){
        $user = strtolower($_GET['User']);
        $email = strtolower($_GET['Email']);
        $this->model = new AccountModel($this->data);
        echo $this->model->check_username($user);

        //Checks to see if the email is correctly formatted.
        if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $email)) {
            $email = "false";
        }else{
            $email = "true";
        }

        //Returns both answers in a comma delimitted fashion.
        echo ",".$email;
    }


    public function profile(){

    }

    //Purges the session array of all its contents.
    public function signout(){
        $_SESSION = Array();
    }


}


?>