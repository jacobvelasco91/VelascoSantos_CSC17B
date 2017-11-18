<?php   require_once 'connect.php'; ?> <!--database info-->
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

    $loginerror = "";                           //set loginerror to an empty html tag element
    if ($_SERVER['REQUEST_METHOD'] == "POST") { //check if there is a request made to the server | if yes, enter statement
      $conn = new mysqli($hn,$un,$pw,$db);      //make database connection | create a new instance of mysqli object | using connect.php
      if ($conn->connect_error) { //if error connecting, send to error page
      header("location: /VelascoSantos_CSC17B/projects/sCrtProj2/StoreFront/error1044.html");
      } else { //else no error connecting continue with getting user input
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $query = "SELECT * FROM accounts WHERE email='$email' and password='$pass'"; //Create a query to retreive data to match
        $result = $conn->query($query); //result becomes object | execute query and check for any rows returned
        if($result->num_rows > 0){ //if returned 1 or more row send to homepage
          header("location: /VelascoSantos_CSC17B/projects/sCrtProj2/StoreFront/index.html");
        } else { //give an error
          $loginerror = "Sorry, no matched account. Try it again?";
        }
      } //end of else connection true
    }//END http request
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
        <h1>sign in</h1><br><br>
        <?php echo "<p style='color:red;'>".$loginerror."</p>"; ?>
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
