<?php 


class AccountModel extends Model{

    //Checks for existing usernames.
    public function check_username($user){
        //Requests all usernames that match the one in question.
        $check = $this->data->retrieve_all("Select * From Accounts Where UName = '$user';", "Account");

        //If $check is not empty, then the user exists and the method returns true.
        if(count($check) > 0){
            return "true";
        }
        //Otherwise it returns false.
        return "false";
    }


    //Adds a user to the database.
    public function add_user($email, $user, $pass){
        //In case this fails, a try catch will present an error.
        try{
            $this->data->direct_edit("Insert into Accounts (Email, Pass, AuthLevel, UName)
            Values('$email','$pass','1','$user');");
            return true;
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function signin($user, $pass){
        //Returns the record for further validation.
        return $this->data->retrieve_all("Select * From Accounts Where
        UName='$user' and Pass='$pass';", "Account");
    }

    //Updates user email and username by identifying the user's current username in the database.
    //Also updates the files so that they have the updated user credentials.
    public function updateInfo($nUser, $email, $user){
        $this->data->direct_edit("Update Accounts Set UName = '$nUser', Email = '$email' 
        Where UName = '$user';
        Update Files Set UName = '$nUser'
        Where UName = '$user';");
    }
}

?>