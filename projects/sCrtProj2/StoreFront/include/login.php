<?php
$loginerror = "";                           //set loginerror to an empty html tag element
if ($_SERVER['REQUEST_METHOD'] == "POST") { //check if there is a request made to the server | if yes, enter statement
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $query = "SELECT * FROM accounts WHERE email='$email'"; //Create a query to retreive data to match
    $result = $Conn->query($query); //result becomes object | execute query and check for any rows returned
    if($result->num_rows > 0){ //if returned 1 or more row send to homepage |email matched
      $record = $result->fetch_assoc();
      $hashPass = $record['password'];
      echo $pass;
      echo $hashPass;
      if (password_verify($_POST['password'], $hashPass) == true) {
        $cookie_name = "user_id";
        $cookie_value = $record['user_id'];
        setcookie($cookie_name,$cookie_value, time() + 3600); //cookie will expire in 1 hour
        header("location: ./shop.php");
        //close database
        $Conn->close();
      } else {
        $loginerror = "Sorry, no matched account. Try it again?";
      }
    } //end of else connection true
}//END http request
?>
