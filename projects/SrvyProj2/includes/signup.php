<?php
$nPrblm = true;
$ePrblm = true;
$lPrblm = true;
$pPrblm = true;
$signup_message = "";
$firstname="";
$email="";
$lastname="";

//if user has submitted the form, validate input
if (isset($_POST['submit'])) {

//an array to hold error codes
  $errors = array();

  //if username is set, enter username validation
  if (isset($_POST['firstname'])) {
    $firstname = $_POST['firstname'];
    $nPreg = "/^[a-z1-9]{1,20}$/im";
    $nMatch = preg_match($nPreg,$firstname);
    if ($nMatch) {
      $nPrblm = false;
    } else {
      $nPrblm = true;
      $errors[] = "firstname must be less than 20 characters, combination of letters and numbers. no spaces.";
    }
  } //exit username validation
  if (isset($_POST['lastname'])) {
    $lastname = $_POST['lastname'];
    $nPreg = "/^[a-z1-9]{1,20}$/im";
    $nMatch = preg_match($nPreg,$lastname);
    if ($nMatch) {
      $lPrblm = false;
    } else {
      $lPrblm = true;
      $errors[] = "lastname must be less than 20 characters, combination of letters and numbers. no spaces.";
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
if ($nPrblm == false && $ePrblm == false && $pPrblm == false && $lPrblm == false) {
  $dbPrblm = false;
  $errors = array();
  //include connect file
  require_once './includes/connect.php';
  require_once './includes/newUser.php';
    //create an instance of newUser class | pass in db connection
    $account = new NewUser($Conn);
    //Create query to check if that email is already in use & execute query
    $query = "SELECT * FROM s_accounts WHERE email='{$account->getEmail()}'";
    if ($result = $Conn->query($query)) { //if query returned true | check how many rows came back
      //if rows > 0 , account with that email exists. problem = true
      $rowCnt = $result->num_rows;
      if ($rowCnt > 0 ) {//if email entered returned >0 records from db
        $dbPrblm = true;
        $errors[]= "An account with that email already exists.";
      } elseif ($rowCnt == 0) { //if email entered returned 0 records from db
        //if 0 rows were returned, email valid for entry  | make new query to insert into data base
        $query = "INSERT INTO s_accounts (first_name,last_name,email,password,reg_date)
        VALUES('{$account->getFirstname()}','{$account->getLastname()}','{$account->getEmail()}','{$account->getPassword()}',NOW())";
        //execute query
        if ($result = $Conn->query($query)) { //if query executed properly close database
            $Conn->close();
        } else {
          header("refresh:3; url=./login_page.php");
          $dbPrblm = true;
          $errors[] = "uh-oh something went wrong.".$Conn->error;
        }
      } // exit 'elseif' statement  email entered returned 0 records
    } else {
      header("refresh:2; url=./index.php");
      echo "<h1>woops! something went wrong<h1>";
    }
}


//if there are no Problems, user data has been queried , safe to go to login page
if ($nPrblm == false && $ePrblm == false && $pPrblm == false && $dbPrblm == false ) {
  header("refresh:2, url=./index.php");
  $signup_message = "Thanks, go log in!";
}

?>
