    <?php
    $validacc = "jacobvelasco91@gmail.com";
    if (isset($_POST['submit'])) {
      $email1 = $_POST["email"];
      if ($email1 != $validacc) {
        function noacc(){
          echo "<p class='noacc'>No account found</p>";
        }
      }else {
        header('Location:./index.html');
      }
    }

    ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
      <meta name="author" content="Santos Velasco">
      <link rel="stylesheet" href="./css/stylelogin.css">
      <script src="./js/login.js"></script>
    <title>AllThings|Login</title>
  </head>
  <body>

    <!--Header Area-->
    <header>
      <div class="logo">
        <a id="logo" href="index.html"><img src="./images/arrowleft.jpg" alt="logo"></a>
      </div>
    </header>
    <!--END Header area-->

    <!--start of FORM -->
    <form class="loginform" name="loginform" action="login.php" method="post" onsubmit="return validate()">
        <img src="./images/logo.png" alt="logo"><br>
        <h1>sign in</h1><br><br>
        <?php if (isset($_POST['submit'])) { noacc(); } ?>
        <fieldset>
          <legend id="legendemail">email</legend>
          <input type="text" name="email" placeholder="..." required>
          <p id='valemail'></p>
        </fieldset><br>
        <fieldset>
          <legend>password</legend>
          <input type="password" name="password" placeholder="..." required>
          <p id="valpass"></p>
        </fieldset><br>
        <input class="submit" type="submit" name="submit" value="sign in">
        <br><br>
        <hr>
        <br>
        <p>dont have an account?</p><br>
        <a class="signup" href="signup.php">create an account</a>
      </form>

      <!-- END FORM -->




      <br><br>




  </body>
</html>
