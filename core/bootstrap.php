<?php

//Controllers
require 'controllers/Controller.php';
require "controllers/StaticPageController.php";
require "controllers/AccountController.php";
require "controllers/FileController.php";

//Models
require 'models/Model.php';
require 'models/account.model.php';
require 'models/file.model.php';
require 'models/home.model.php'; 

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