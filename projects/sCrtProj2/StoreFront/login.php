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
    <?php
    $loginerror = "";
    //check if there is a request made to the server | if yes, enter statement
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      //make connection to database
      $dbc = @mysqli_connect("localhost","root","","Newsletter");
      //Identify the character set | to allow mysqli_real_escape_string
      mysqli_real_escape_string($dbc,'utf-8');
      //Get information from the login form | already validated in JS ****Make sure****
      $email = mysqli_real_escape_string($_POST['email']);
      $password = mysqli_real_escape_string($_POST['password']);
      //make query & execute | check database for email and password account
      $query = "SELECT * FROM accounts";

    }
     ?>

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
        <?php echo $loginerror;?>
        <h1>sign in</h1><br><br>
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
