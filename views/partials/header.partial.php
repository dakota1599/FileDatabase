<?php //This is the default layout page.
require 'core/variables.php';
?>

<html>
<head>
<!--Jquery CDN-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!--Main Javascript File.-->
<script src="<?=$web?>core/js/main.js"></script>
<!--W3 CSS-->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<!--Page Specific CSS-->
<link rel="stylesheet" href="<?=$web?>core/css/<?=$css?>">
</head>
<body>
<div class="w3-top w3-bar">
<?php if($_SESSION['validated']) { ?>
    <a href="#" onclick="signout()" class="w3-bar-item w3-button w3-padding-16 w3-mobile w3-right">Sign Out</a>
<?php } else { ?>
    <a href="/signin" class="w3-bar-item w3-button w3-padding-16 w3-mobile w3-right">Sign In</a>
<?php } ?>

</div>