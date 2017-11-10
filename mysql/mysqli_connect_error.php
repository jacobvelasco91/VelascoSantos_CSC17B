<!--PHP for the web , pg 352-354-->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Error handling in MySQL</title>
  </head>
  <body>
    <?php
    //Testing the process of connecting to a database in MySQL database server
    //'@' will supress any error code from being printed. error still happens
    //The error here is the 'username' = 'root' is mispelled
    if ($dbc = @mysqli_connect("localhost","rooot","","store")) {
      echo "<p style='color:green;'>Sucessfully connected to a database in the MySQL server</p>";
      mysqli_close($dbc);
    }
    //Placing the cause of an error in the message, do this for debugging
    else{
      echo "<p style='color:red;'>Could not connect
      to a database in MySQL database server:<br>".mysqli_connect_error()."</p>";
    }
     ?>

  </body>
</html>
