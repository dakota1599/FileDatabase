<?php
session_start(); //For when I need session variables (if I'll need them.)


if(isset($_GET['FileName'])){
    $paths = ["htm" => "text/html",
    "exe" => "application/octet-stream",
    "zip" => "application/zip",
    "doc" => "application/msword",
    "jpg" => "image/jpg",
    "php" => "text/plain",
    "xls" => "application/vnd.ms-excel",
    "xlsx" => "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
    "ppt" => "application/vnd.ms-powerpoint",
    "gif" => "image/gif",
    "pdf" => "application/pdf",
    "txt" => "text/plain",
    "html"=> "text/html",
    "png" => "image/png",
    "jpeg"=> "image/jpg"
];
    
}

/*
//Redirects all http requests to https
if(!isset($_SERVER['HTTPS'])){
    header('Location:https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],true,301);
}
*/

$web = 'http://eonweb.ga/';

//This bootstrap file sets up all the necessary stuff.
require 'core/bootstrap.php';

//Calls the diret function from the router variable.
$router->Direct(Request::uri());


?>
