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
}

?>