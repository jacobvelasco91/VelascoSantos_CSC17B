<?php
  require_once './login.php';
  ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ZELDA | CSC17B</title>
    <link rel="stylesheet" href="./css/landingPage.css">
    <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
  </head>
  <body>
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
      <a class="signup-button" href="./signup.php">sign up to play!</a>
    </div>
    <hr>
    <footer>
      <div class="credintials">
        <p>CSC17B Team Members: </p>
      </div>
    </footer>


  </body>
</html>
