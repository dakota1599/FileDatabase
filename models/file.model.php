<?php 
    

class FileModel extends Model{

    public function upload(){
        try{
        //Opens uploaded file.
        $file = fopen($_FILES['file']['tmp_name'], 'rb');

        //Gets the contents of the file.
        $contents = fread($file, filesize($_FILES['file']['tmp_name']));

        //Gets File Name
        $name = $_FILES['file']['name'];

        //Gets User's username
        $username = $_SESSION['UName'];

        //Gets the current date
        $date = date("Y-d-m");

        //Gets the file size;
        $size = $_FILES['file']['size'];

        //Encodes the info into Base64
        $contents = base64_encode($contents);

        //Sends the picture info to the server
        $this->data->direct_edit("Insert into Files(Title, UName, UploadDate, Contents, Size)
        Values('$name','$username','$date','$contents', '$size');");

        return 'Success';
        }catch(Exception $e){
            return 'Failed';
            echo $e->getMessage();
        }
    }
}


?>