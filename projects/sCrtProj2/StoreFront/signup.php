<!--When creating an account, it would be good to check if an email has already
been used. If it has, return error to user, if its okay, continue with account creation-->



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>All Things | register account</title>
  </head>
  <body>

    <?php

     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       //connect to database first
       $dbc = new mysqli("localhost","root","","Newsletter");
       //set charset code
       $dbc->set_charset('utf-8');
       //grab info from form email,firstname,lastname,password and strip
       $signup_email = $dbc->real_escape_string(trim(strip_tags($_POST['email'])));
       $signup_fname = $dbc->real_escape_string(trim(strip_tags($_POST['fname'])));
       $signup_lname = $dbc->real_escape_string(trim(strip_tags($_POST['lname'])));
       $signup_password = $dbc->real_escape_string(trim(strip_tags($_POST['password'])));
       //Make a query to insert into table
       $query = "INSERT INTO accounts (email,fname,lname,password) VALUES('$signup_email','$signup_fname','$signup_lname','$signup_password')";
       //execute query
       if ($dbc->query($query)) {
         echo "account created";
       }else{
         echo "There was a problem creating an account";
       }
      }
       ?>


<!--HEADER-->
      <p>Register Account</p>
      <hr>
<!--FORM-->
     <form class="" action="signup.php" method="post">
       <p>EMAIL:<input type="text" name="email"></p>
       <p>First Name:<input type="text" name="fname"></p>
       <p>Last Name:<input type="text" name="lname"></p>
       <p>Password:<input type="password" name="password"></p>
       <input type="submit" name="submit">
     </form>


  </body>
</html>
