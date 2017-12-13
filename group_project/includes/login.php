<?php
  $error = "";
  if (isset($_POST['submit'])) {
    //connect to database ***** MUST CHANGE TO GROUP DATABASE *******
    require_once 'connect.php';
    //grab email and password from POST array
    if (isset($_POST['email']) && isset($_POST['password'])) {
      $email = $_POST['email'];
      $pass = $_POST['password'];
      //check if their entered information is on database
      $query = "SELECT * FROM accounts WHERE email='$email'";
      $result = mysqli_query($Conn,$query);
      $row_cnt = mysqli_num_rows($result);
      //if less than 1 row returned, there was no account in the database
      if ($row_cnt < 1) {
        $error = "<div class='error'><span>email/password invalid</span></div>";
      } else { //there was a matched record in the database | now match the hashed password
        //get record data as associative array
        $record = mysqli_fetch_assoc($result);
        $hashPass = $record['password'];
        echo $pass;
        echo $hashPass;
        if (password_verify($_POST['password'], $hashPass) == true) {
          $cookie_name = "user_blog";
          $cookie_value = $record['id_user'];
          setcookie($cookie_name,$cookie_value, time() + 3600); //cookie will expire in 1 hour
          header("location: ./ZeldaGroup_CSC17B-master/index.html");
          //close database
          mysqli_close($Conn);
        } else {
          $error = "<div class='error'><span>email/password invalid</span></div>";
        }
      }//exit else there was a matched record
    }//exit if email & password set
  }//exit if submit
  ?>
