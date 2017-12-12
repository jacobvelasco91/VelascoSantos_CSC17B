<!--When creating an account, it would be good to check if an email has already
been used. If it has, return error to user, if its okay, continue with account creation-->



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>All Things | register account</title>
    <script src="./js/signup.js"></script>
  </head>
  <body>
    <!-- NEED TO ADD SO NO MORE THAN ONE USER WITH SAME NAME EXISTS -->

    <?php
    $signerror="";
     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       //create mysqli object to connect
       $dbc = new mysqli("localhost","root","","sCart");
       //set charset code | using the object's properties
       $dbc->set_charset('utf-8');
       //grab info from form email,firstname,lastname,password and strip
       $signup_email = $dbc->real_escape_string(trim(strip_tags($_POST['email'])));
       $signup_fname = $dbc->real_escape_string(trim(strip_tags($_POST['fname'])));
       $signup_lname = $dbc->real_escape_string(trim(strip_tags($_POST['lname'])));
       $signup_password = $dbc->real_escape_string(trim(strip_tags($_POST['pass'])));
       //make query to check if email already exists
       $query = "SELECT * FROM accounts WHERE email='$signup_email'";
       $result = $dbc->query($query);
       if ($result->num_rows > 0) {
         $signerror = "An account with that email already exists. Try logging in.";
       } else {
       //Make a query to insert into table
       $query2 = "INSERT INTO accounts (email,fname,lname,password) VALUES('$signup_email','$signup_fname','$signup_lname','$signup_password')";
       //execute query | using properties of mysqli object.... mysqli_query()
       if ($dbc->query($query2)) { //if query returned true go back to hoome page
         setcookie("user", $signup_fname, time() + (86400 * 30), "/");
         header("location: /VelascoSantos_CSC17B/projects/sCrtProj2/StoreFront/index.html");
       }else{
         echo "There was a problem creating an account";
       }
     }
      }
       ?>


<!--HEADER-->
      <p>Register Account</p>
      <hr>
<!--FORM-->
    <?php echo "<p id='signerror'>".$signerror."</p>";?>
     <form name="signupform" action="signup.php" method="post" onsubmit="return validate();">
       <p>EMAIL:<input type="text" name="email" required></p>
       <p>First Name:<input type="text" name="fname" required></p>
       <p>Last Name:<input type="text" name="lname" required></p>
       <p>Password:<input type="password" name="pass" required></p>
       <p>Confirm Password:<input type="password" name="confirmPass" required></p>
       <input type="submit" name="submit">
     </form>


  </body>
</html>
