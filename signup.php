<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Blog | signup</title>
    <link href="./css/signup.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
  </head>
  <body>
    <?php
$error = "";
$usernameError = "";
$emailError = "";
$passwordError = "";
$repassError = "";
$nPrblm = true;
$ePrblm = true;
$pPrblm = true;

if (isset($_POST['submit'])) {
  if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $nPreg = "/^[a-z1-9]{1,20}$/im";
    $nMatch = preg_match($nPreg,$username);
    if ($nMatch) {
      $nPrblm = false;
    } else {
      $nPrblm = true;
      $usernameError = "<p style='background-color:pink;font-size:8;color:darkred;'>uh-oh! username must be less than 20 characters using a combination of letters and numbers. no spaces.</p>";
    }
  }
  if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $ePreg = "/^[a-zA-Z0-9]+(\.)?[a-z0-9]+@([a-z0-9]+)?(\.)?([a-z0-9]+)?\.(com|net|org|io|edu|gov)*$/im";
    $eMatch = preg_match($ePreg,$email);
    if ($eMatch) {
      $ePrblm = false;
    } else {
      $ePrblm = true;
      $emailError = "<p style='background-color:pink;'>email invalid</p>";
    }
  }
  if (isset($_POST['password']) && isset($_POST['re-pass'])) {
    $pass = $_POST['password'];
    $rePass = $_POST['re-pass'];
    $pPreg = '/[a-zA-Z0-9(!@#$%^&*()_+}{|"?><~)]{8,25}$/m';
    $pMatch = preg_match($pPreg,$pass);
    if ($pMatch) {
      if ($pass == $rePass) {
        $pPrblm = false;
      } else {
        $pPrblm =true;
        $repassError = "<p style='background-color:pink;'>password does not match</p>";
      }
    } else {
      $pPrblm = true;
      $passwordError = "<p style='background-color:pink;'>password must be 8-20 alphanumeric characters.</p>";
    }
  }
}
//if all inputs are valid, run it through the database. flag any problems
if ($nPrblm == false && $ePrblm == false && $pPrblm == false) {
  $problem = false;
  //include connect file
  require_once 'connect.php';
  //connect to database
  $Conn = @mysqli_connect($hn,$un,$pw,$db);
  if ($Conn == false) {
    header("refresh:2; url=./index.php");
    echo "<h1>Sorry there was a problem connecting to the Server:".mysqli_connect_error()."</h1>";
  } else {
    //set charset for secure SQL
    mysqli_set_charset($Conn,"utf-8");
    //sanitize user input for databse entry | using function to clean user input
    $username = clean_input($Conn,$username);
    $email = clean_input($Conn,$email);
    $pass = clean_input($Conn,$pass);
    //Create query to check if that email is already in use & execute query
    $query = "SELECT * FROM accounts WHERE email='{$email}'";
    if ($result = mysqli_query($Conn,$query)) {
      //if rows > 0 , account with that email exists. problem = true
      if (($rows = mysqli_num_rows($result)) > 0 ) {
        $problem = true;
        $error = "<p>an account with that email already exists.</p>";
      } elseif (($rows = mysqli_num_rows($result)) == 0) {
        //if 0 rows were returned, make new query to insert into data base
        $query = "INSERT INTO accounts (email,username,password) VALUES('{$email}','{$username}','{$pass}')";
        //execute query
        if ($result = mysqli_query($Conn,$query)) {
          header("refresh:2; url=./index.php"); //delay to show thanks for signup
          echo "<h1>Thanks , go Log in!</h1>";
        } else {
          header("refresh:2; url=./index.php");
          echo "<h2>uh-oh something went wrong.</h2>";
        }
      }
    } else {
      header("refresh:2; url=./index.php");
      echo "<h1>woops! something went wrong<h1>";
    }
  }
}
//if ANY problem with name, email, pass or account alrady in DB, display form
if ($nPrblm == true || $ePrblm == true || $pPrblm == true || $problem == true) {
  echo <<<_END
  <div class="signup-container">
  <header>
  <img src="https://img00.deviantart.net/db93/i/2011/340/9/3/link_the_legend_of_zelda_8bit_full_hd_by_racamo7-d4id3wn.png" alt="zelda image" width="20%" height="auto">
  </header>
  <h1 class="title">Create your personal account.</h1>
  {$error}
    <form style="padding:20px;" action="signup.php" method="post">
      <input class="input-text" type="text" name="username" placeholder="username" required><br>
      {$usernameError}
      <input class="input-text" type="text" name="email" placeholder="email" required><br>
      {$emailError}
      <input class="input-text" type="password" name="password" placeholder="password" required><br>
      <input class="input-text" type="password" name="re-pass" placeholder="re-enter password" required><br>
      {$repassError}{$passwordError}
      <input class="input-submit" type="submit" name="submit" value="Register!">
    </form>
  </div>
_END;
}

  ?>
  <hr>
  <footer>
    <div class="credintials">
      <p>CSC17B Team Members: </p>
    </div>
  </footer>

  </body>
</html>
<?php
function clean_input ($conn,$input){
  $input = mysqli_real_escape_string($conn,trim(strip_tags($input)));
  return $input;
}
 ?>
