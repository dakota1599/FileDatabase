<?php


class FileModel extends Model
{

    public function upload()
    {
        try {

            //This outfit is for uploading multiple files
            $cFile = $this->reArrayFiles($_FILES['file']);
            //Loopin through the array of files.
            for($i = 0; $i < count($cFile); $i++) {

                //Opens uploaded file.
                $file = fopen($cFile[$i]['tmp_name'], 'rb');

                //Gets the contents of the file.
                $contents = fread($file, filesize($cFile[$i]['tmp_name']));

                //Gets File Name
                $name = $cFile[$i]['name'];

                //Gets User's username
                $username = $_SESSION['user'];

                //Gets the current date
                $date = date("Y-d-m");

                //Gets the file size;
                $size = $cFile[$i]['size'];

                //Encodes the info into Base64
                $contents = base64_encode($contents);

                //Sends the picture info to the server
                $this->data->direct_edit("Insert into Files(Title, UName, UploadDate, Contents, Size)
        Values('$name','$username','$date','$contents', '$size');");
            }
            return 'Success';
        } catch (Exception $e) {
            return 'Failed';
            echo $e->getMessage();
        }
    }

    //For Deleting records
    public function delete($ID)
    {
        $this->data->direct_edit("Delete From Files Where ID = '$ID';");
    }


    //Reformats the incoming files into a better array.  Stolen from php.net.
    private function reArrayFiles(&$file_post)
    {

        $file_ary = array();
        $file_count = count($file_post['name']);
        $file_keys = array_keys($file_post);

        for ($i = 0; $i < $file_count; $i++) {
            foreach ($file_keys as $key) {
                $file_ary[$i][$key] = $file_post[$key][$i];
            }
        }

        return $file_ary;
    }
}
?>