<?php //Database connection credentials
  $hn = "localhost"; //HOSTNAME
  $un = "root";     //USERNAME
  $pw = "";         //PASSWORD
  $db = "velasco";    //STORE
  $Conn = new mysqli($hn,$un,$pw,$db);
  if ($Conn == false) {
    header('refresh:3 url=../index.php');
    echo "sorry, we're experiencing some technical issues";
  }
 ?>
