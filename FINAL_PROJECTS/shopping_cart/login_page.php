<?php
$title = "login";
$numItems = 0;
include_once "./include/connect.php";
include_once "./include/head.php";
include_once "./include/login.php";
?>
    <!--start of FORM -->
<form class="login-form" action="login_page.php" method="post" onsubmit="return validate()">
  <h1>sign in</h1>
  <?php echo "<p style='color:red;'>".$loginerror."</p>"; ?>
  <input type="text" name="email" placeholder="email" required>
  <p id='valemail'></p>
  <input type="password" name="password" placeholder="password" required>
  <p id="valpass"></p>
  <input class="submit" type="submit" name="submit" value="sign in">
  <hr>
  <p>dont have an account?</p>
  <a class="signup" href="signup_page.php">create an account</a>
</form>

      <!-- END FORM -->

<?php include_once "./include/footer.html";  ?>
