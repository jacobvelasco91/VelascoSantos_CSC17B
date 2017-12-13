<?php
$title = "Home";
include_once "./includes/head.html";
require_once './includes/login.php';
  ?>
    <header>
      <video width="auto" height="auto" autoplay loop >
        <source src="./zelda_images/zelda_promo1.mp4" type="video/mp4">
        Your browser does not support the video tag.
      </video>
    </header>
    <h1 class="title">Zelda for the Modern Gamer</h1>
    <div class="login-container">
      <div class="login-form-container">
        <form class="login-form" action="index.php" method="post">
          <h2>Login</h2>
          <input type="text" name="email" placeholder="E-MAIL" required><br>
          <input type="password" name="password" placeholder="PASSWORD" required><br>
          <input class="submit" type="submit" name="submit" value="login">
          <?php echo $error; ?>
        </form>
      </div>
    </div>
    <div class="signup-container">
        <a class="signup-button" href="./signup_page.php">sign up to play!</a>
    </div>
    <hr>
<?php include_once "./includes/footer.html"; ?>
