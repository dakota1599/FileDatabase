<?php
require 'request.php';
require 'classes.php';
require 'sql.php';
require 'routes.php';
require 'router.php';


//Database bootstrap
$config = require 'config.php';
//Creates new Database Object
$db = new SQL($config['database']);

//Creates new Router
$router = new Router($routes, $db);


?>
