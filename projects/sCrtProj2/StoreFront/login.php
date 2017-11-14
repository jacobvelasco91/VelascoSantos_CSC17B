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
      //Get information from the login form | already validated in JS
      $email = $_POST['email'];
      $password = $_POST['password'];
      //make connection to database
      $dbc = @mysqli_connect("localhost","root","","Newsletter");
      //make query | check database for email and password account
      $query = "SELECT * FROM accounts";
      if (($result = @mysqli_query($dbc,$query)) == true) {
        while (($row = mysqli_fetch_array($result)) != NULL ) {
          echo $row[0];
          echo $row[1];
          echo $row[2];
          echo $row[3];
          echo $row[4];
        }
      }else {
        echo "could not";
      }
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
