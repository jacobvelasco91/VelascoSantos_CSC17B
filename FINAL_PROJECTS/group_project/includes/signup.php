<?php
$nPrblm = true;
$ePrblm = true;
$pPrblm = true;
$signup_message = "";
$username="";
$email="";

//if user has submitted the form, validate input
if (isset($_POST['submit'])) {

//an array to hold error codes
  $errors = array();
  //if username is set, enter username validation
  if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $nPreg = "/^[a-z1-9]{1,20}$/im";
    $nMatch = preg_match($nPreg,$username);
    if ($nMatch) {
      $nPrblm = false;
    } else {
      $nPrblm = true;
      $errors[] = "username must be less than 20 characters, combination of letters and numbers. no spaces.";
    }
  } //exit username validation
  //if email is set enter email validation
  if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $ePreg = "/^[a-zA-Z0-9]+(\.)?[a-z0-9]+@([a-z0-9]+)?(\.)?([a-z0-9]+)?\.(com|net|org|io|edu|gov)*$/im";
    $eMatch = preg_match($ePreg,$email);
    if ($eMatch) {
      $ePrblm = false;
    } else {
      $ePrblm = true;
      $errors[] = "email invalid.";
    }
  }//exit email validation
  //if password is set, enter password validation
  if (isset($_POST['password'])) {
    $pass = $_POST['password'];
    $pPreg = '/^[a-zA-Z0-9(!@#$%^&*()_+}{|"?><~)]{8,25}$/m';
    $pMatch = preg_match($pPreg,$pass);
    if ($pMatch) {
      $pPrblm =false;
    } else {
      $pPrblm = true;
      $errors[] = "password must be 8-20 alphanumeric characters.";
    }
  }//exit password validation
}//exit form submit validation


//if all inputs are valid, run it through the database. flag any problems
if ($nPrblm == false && $ePrblm == false && $pPrblm == false) {
  $dbPrblm = false;
  $errors = array();
  //include connect file
  require_once './includes/connect.php';
  require_once './includes/newUser.php';
    //create an instance of newUser class | pass in db connection
    $user = new NewUser($Conn);
    //Create query to check if that email is already in use & execute query
    $query = "SELECT * FROM accounts WHERE email='{$user->getEmail()}'";
    if ($result = mysqli_query($Conn,$query)) { //if query returned true, enter multiple email validation
      //if rows > 0 , account with that email exists. problem = true
      if (($rows = mysqli_num_rows($result)) > 0 ) {//if email entered returned >0 records from db
        $dbPrblm = true;
        $errors[]= "An account with that email already exists.";
      } elseif (($rows = mysqli_num_rows($result)) == 0) { //if email entered returned 0 records from db
        //if 0 rows were returned, make new query to insert into data base
        $query = "INSERT INTO accounts (email,username,password) VALUES('{$user->getEmail()}','{$user->getUsername()}','{$user->getPassword()}')";
        //execute query
        if ($result = mysqli_query($Conn,$query)) { //if query executed properly close database
            mysqli_close($Conn);
        } else {
          header("refresh:3; url=./index.php");
          $dbPrblm = true;
          $errors[] = "uh-oh something went wrong.";
        }
      } // exit if else statement of email returned 0 records
    } else {
      header("refresh:2; url=./index.php");
      echo "<h1>woops! something went wrong<h1>";
    }
}


//if there are no Problems, user data has been queried , safe to go to login page
if ($nPrblm == false && $ePrblm == false && $pPrblm == false && $dbPrblm == false ) {
  header("refresh:2, url=./index.php");
  $signup_message = "Thanks, go log in and play!";
}

?>
