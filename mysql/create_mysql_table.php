<!-- PHP for the web, pg 356-357-->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Create MySQL table</title>
  </head>
  <body>
    <?php
    if ($dbc = @mysqli_connect("localhost","root","","myblog")) {

      //Defining the Query to create table | This will have an SQL command
      $query = 'CREATE TABLE entries (
        id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(100) NOT NULL,
        entry text NOT NULL,
        date_entered DATETIME NOT NULL
      ) CHARACTER SET utf8 ';
      //execute the Query | takes two arguments : database and SQL query
      if (@mysqli_query($dbc,$query)) {
        echo "<p>The table has been created!</p>";
      }
      else { //If the query did not work | giving appriate error codes
        echo "<p style='color:red;'>Could not create table because:<br>"
        .mysqli_error($dbc)."</p><p>The query being run was:<br>".$query."</p>";
      }
      mysqli_close($dbc); //close the database connection

    }else { //else if there was no connection to database
      echo "<p style='color:red;'>Could not connect to database:<br>"
      .mysqli_connect_error()."</p>";
    }
     ?>

  </body>
</html>
