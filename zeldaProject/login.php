<?php
  $error = "";
  if (isset($_POST['submit'])) {
    //connect to database ***** MUST CHANGE TO GROUP DATABASE *******
    require_once 'connect.php';
    $Conn = mysqli_connect($hn,$un,$pw,$db);
    //grab email and password from POST array
    if (isset($_POST['email']) && isset($_POST['password'])) {
      $email = $_POST['email'];
      $pass = $_POST['password'];
      //check if their entered information is on database
      $query = "SELECT * FROM accounts WHERE email='$email' AND password='$pass'";
      $result = mysqli_query($Conn,$query);
      $row_cnt = mysqli_num_rows($result);
      //if less than 1 row returned, there was no account in the database
      if ($row_cnt < 1) {
        $error = "<div class='error'><span>email/password invalid</span></div>";
      } else {
        //get the data record from the email and pass, get the asso array and the column name of that id
        $record = mysqli_fetch_assoc($result);
        $cookie_name = "user_blog";
        $cookie_value = $record['id_user'];
        setcookie($cookie_name,$cookie_value, time() + 3600); //cookie will expire in 1 hour
        header("location: ./gameEngine/index.html");
      }
    }
  }
  ?>
