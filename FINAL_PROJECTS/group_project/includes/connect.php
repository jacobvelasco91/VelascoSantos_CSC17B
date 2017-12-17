<?php
$hn = "localhost";
$un = "root";
$pw = "";
$db = "velasco";
$Conn = mysqli_connect($hn,$un,$pw,$db);
//If there was a problem connecting to the database, throw code, and redirect to home page
  if ($Conn == false) {
    header("refresh:2; url=./index.php");
    echo "<h1>Sorry there was a problem connecting to the Server:".mysqli_connect_error()."</h1>";
  } else {
    //set charset for secure SQL
    mysqli_set_charset($Conn,"utf-8");
  }
?>
