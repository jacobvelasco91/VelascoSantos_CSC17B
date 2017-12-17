<?php
session_start();
//check if user has logged in | if they have, 'u_id' will contain their user_id
if (isset($_SESSION['u_id'])) {
  include_once "./includes/connect.php";
  $sql = "SELECT first_name FROM s_accounts WHERE id_user={$_SESSION['u_id']}";
  $result = $Conn->query($sql);
  $record = $result->fetch_assoc();
  $username = $record['first_name'];
  //option for user to log out and go home
  $log = "<div class='logging'>Hi, {$username}<a href='./home.php'>Home</a><a href='./includes/logout.php'>logout</a></div>";
} else {

  $log = "<div class='logging'><a href='./index.php'>login / sign up</a></div>";
}

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Survey Bunny | <?php echo $title; ?> </title>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link rel="stylesheet" href="./css/reset.css" type="text/css">
    <link rel="stylesheet" href="./css/header.css" type="text/css">
    <link rel="stylesheet" href="./css/footer.css" type="text/css">
    <link rel="stylesheet" href="./css/index.css" type="text/css">
    <link rel="stylesheet" href="./css/home.css" type="text/css">
    <link rel="stylesheet" href="./css/surveytable.css" type="text/css">
    <link rel="stylesheet" href="./css/display.css" type="text/css">
    <script src="./javascript/valLogin.js"></script>


  </head>
  <body>
    <header class="header">
      <a href="./index.php"><img src="./images/bunny.png" alt="bunny image"></a>
      <h3>Survey Bunny</h3>
      <?php echo $log; ?>
    </header>
