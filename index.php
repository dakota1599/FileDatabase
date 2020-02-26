<?php
session_start(); //For when I need session variables (if I'll need them.)


//Redirects all http requests to https
if(!isset($_SERVER['HTTPS'])){
    header('Location:https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],true,301);
}

$web = 'https://example.com/';

//This bootstrap file sets up all the necessary stuff.
require 'core/bootstrap.php';

//Calls the diret function from the router variable.
require $router->Direct(Request::uri());


?>
