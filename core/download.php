<?php 
session_start();
//This file is for all downloads.  It has to be done this way due to how the
//MVC is set up for the site.

require 'classes.php';
require 'sql.php';
require 'config.php';

//If the key matches the session key, then the server processes the request.
if ($_GET['Key'] == (string)$_SESSION['key'][$_GET['ID']]) {

    $ID = $_GET['ID'];
    //Database bootstrap
    $config = require 'config.php';
    //Creates new Database Object
    $data = new SQL($config['database']);

    //Retrieving the data.
    $file = $data->retrieve_all("Select * From Files Where ID = '$ID';", "File");

    $name = $file[0]->Title;

    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header("Content-Disposition: attachment; filename=$name");
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');

    echo base64_decode($file[0]->Contents);
}
else{
    //Taunt to hackers.
    echo "Nice Try.";
}
?>