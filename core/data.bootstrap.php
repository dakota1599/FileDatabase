<?php 
require 'sql.php';

//Database bootstrap
$config = require 'config.php';
//Creates new Database Object
$db = new SQL($config['database']);

return $db;
?>