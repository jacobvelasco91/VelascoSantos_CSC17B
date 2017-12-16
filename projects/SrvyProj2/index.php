<?php
$title = "home";
include_once "./includes/head.php";
 ?>

<?php //javascript regX ?>
<div class="login-container">
  <form class="login-form"name="login" action="home.php" method="post" onsubmit="return validate()">
    <h1>sign in</h1>
    <input type="text" name="email" placeholder="email" required>
    <p id='valemail'></p>
    <input type="password" name="password" placeholder="password" required>
    <p id="valpass"></p>
    <input class="submit" type="submit" name="submit" value="sign in">
    <hr>
    <p>dont have an account?</p>
    <a class="signup" href="signup_page.php">create an account</a>
  </form>
</div>


 <?php include_once "./includes/footer.php";?>
