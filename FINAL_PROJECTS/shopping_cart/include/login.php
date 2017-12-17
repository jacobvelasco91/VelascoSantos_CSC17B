<?php
$loginerror = "";                           //set loginerror to an empty html tag element
if ($_SERVER['REQUEST_METHOD'] == "POST") { //check if there is a request made to the server | if yes, enter statement
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $query = "SELECT * FROM accounts WHERE email='$email'"; //Create a query to retreive data to match
    $result = $Conn->query($query); //result becomes object | execute query and check for any rows returned
    if($result->num_rows > 0){ //if returned 1 or more row , check password | email matched
      $record = $result->fetch_assoc();
      $hashPass = $record['password'];
      if (password_verify($_POST['password'], $hashPass) == true) {//check password with hash
        //set a session | user id
        $_SESSION['u_id'] = $record['id_user'];
        header("location: ./shop.php");
        //close database
        $Conn->close();
      } else { //else if password didnt match
        $loginerror = "Sorry, no matched account. Try it again?";
      }
    }else { //else no rows were returned.
      $loginerror = "Sorry, no matched account. Try it again?";
    }
}//END http request
?>
