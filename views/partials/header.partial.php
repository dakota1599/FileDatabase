<?php //This is the default layout page.
require 'core/variables.php';

//If validated, then it will display the user's username instead of the website name.
if($_SESSION['validated']){
    $logo = $_SESSION['user'];
}else{
    $logo = "Echo";
}
?>

<html>

<head lang="en-us">

    <title><?=$title?> | <?=$logo?></title>

    <!--Meta Information-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!--Jquery CDN-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!--Main Javascript File.-->
    <script src="<?= $web ?>core/js/main.js"></script>
    <!--W3 CSS-->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Oxanium&display=swap" rel="stylesheet">

    <!--Page Specific CSS-->
    <link rel="stylesheet" href="<?= $web ?>core/css/<?= $css ?>">
    <link rel="stylesheet" href="<?=$web?>core/css/main.css">


    <style>
    *,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: 'Oxanium', cursive;
    }
    </style>

</head>

<body>
    <div class="w3-top w3-bar TopBar w3-card-4">
        <span id="echo" style="font-size: inherit;"
            class="w3-bar-item w3-padding-16 EchoTitle">Echo</span>


        <?php if ($_SESSION['validated']) { ?>
        <a id="log" onclick="signout()" class="w3-bar-item w3-button w3-padding-16 w3-right TopButton">Sign
            Out</a>
        <?php } else { ?>
        <a id="log" href="/signin" class="w3-bar-item w3-button w3-padding-16 w3-right TopButton">Sign In</a>
        <?php } ?>

    </div>