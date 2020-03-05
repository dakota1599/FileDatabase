<?php 
$css = "sign.css";
require 'partials/header.partial.php';

//Generate antiforgery token
if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}
$token = $_SESSION['token'];
?>

<div class="TopItem Center" id="signin">
    <h1>Sign In</h1>
    <form action="/signin" method="post" class="w3-form">
        <input class="w3-input" type="text" name="user" placeholder="Username">
        <input class="w3-input" type="password" name="pass" placeholder="Password">
        <button class="w3-button" type="submit">Submit</button>

        <input name="dest" value="<?=$_GET['dest']?>" class="Hide">
    </form>
    <p style="color:red"><?=$error;?></p>
    <a href="#" onclick="sign()">New here?  Create an account!</a>
</div>

<div class="TopItem Center Hide" id="signup">
    <h1>Sign Up</h1>
    <form action="/signup" method="post" class="w3-form">
        <input id="email" class="w3-input" type="email" name="email" placeholder="Email"
        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Email should follow this rule: someone@website.com">
        <input id="testUser" class="w3-input" type="text" name="user" placeholder="Username">
        <input title="Make at least 8 characters long." id="pass1" class="w3-input" type="password" name="pass" placeholder="Password">
        <input id="pass2" class="w3-input" type="password" placeholder="ReType Password">
        <button class="w3-button" type="button" onclick="verify()">Submit</button>
        <p id="error" style="color:red"></p>
        <input name="token" value="<?=$token?>" class="Hide">
    </form>
    <p id="error" style="color:red"></p>
    <a href="#" onclick="sign()">Have an account?  Sign in!</a>
</div>






<?php 
require 'partials/footer.partial.php';
?>