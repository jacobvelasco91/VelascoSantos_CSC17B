<?php
//starting session to make available session data
  session_start();
//if a user is logged in, log them out, destroy session and redirect to homepage
if (isset($_SESSION['u_id'])) {
    session_unset();
    session_destroy();
    header("location: ../index.php");

}else {
  echo "not logging out or redirecting";
}
 ?>
