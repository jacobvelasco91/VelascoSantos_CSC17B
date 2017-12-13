<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<?php


include_once "./includes/newUser.php";
include_once "./connect.php";

if (isset($_POST['submit'])) {
  mysqli_set_charset($Conn,"utf-8");
  $user = new NewUser($Conn);
  echo $user->getUsername()."<br>";
  echo $user->getEmail()."<br>";
  echo $user->getPassword()."<br>";
  $userpassword = $user->getPassword();
  $password = $_POST['password'];}
?>
<form  action="testClass.php" method="post">
  <input type="text" name="username" value="username">
<input type="text" name="email" value="email">
<input type="text" name="password" value="password">
<input type="submit" name="submit" value="submit">
</form>

  </body>
</html>
?>
