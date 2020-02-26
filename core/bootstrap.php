<?php
require 'routes.php';
require 'router.php';
require 'request.php';
require 'sql.php';
$config = require 'config.php';

//Creates new Router
$router = new Router($routes);

//Creates new Database Object
$db = new SQL($config['database']);


?>
