<!--PHP for the web , pg 348-349-->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Connect to MySQL</title>
  </head>
  <body>
    <?php
    //Testing the process of connecting to a database in MySQL database server
    if ($dbc = mysqli_connect("localhost","root","","myblog")) {

      echo "<p style='color:green;'>Sucessfully connected to a database in the MySQL server</p>";
      mysqli_close($dbc);
    }else{
      echo "<p style='color:red;'>Could not connect to a database in MySQL database server</p>";
    }
     ?>

  </body>
</html>
