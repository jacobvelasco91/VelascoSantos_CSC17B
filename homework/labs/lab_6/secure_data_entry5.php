<!-- PHP for the web, pg 360-365-->
<!--This file demonstrates how you can add data to a database through a form-->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>More secure blog entry</title>
  </head>
  <body>
    <h1>More secure Blog Entry</h1>
    <?php

/* Before we had some security in the fact that we didnt allow html or php tags
   to be sent with strip_tags() and didnt allow white space at end or beginning
   of text with trim().This new php file helps us secure the data being inputed
   even more, by using a function in the query called mysqli_real_escape_string().
   This will escape/preface any potentially harmful characters with a backslash.
   After we connect we have to also set the character set*/


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      //Connect to MySQL database
      if ($dbc = @mysqli_connect("localhost","root","","myblog")) {
        //setting character set
        mysqli_set_charset($dbc,'utf-8'); //takes 2 argmns , dbc and charset
        //Validate and secure form data
        $problem =false;
        if (!empty($_POST['title']) && !empty($_POST['entry'])) {
          //securing data w/ 'mysqli_real_escape_string(), 2 args db & string
          $title = mysqli_real_escape_string($dbc,trim(strip_tags($_POST['title'])));
          $entry = mysqli_real_escape_string($dbc,trim(strip_tags($_POST['entry'])));
        }else {
          echo "enter title and entry in form";
          $problem = true;
        }

        //If there are no problems with validation continue with code
        if (!$problem) {
          //Define Query
          $query = "INSERT INTO entries (title,entry,date_entered) VALUES ('$title','$entry',NOW())";
          //execute the query
          if (@mysqli_query($dbc,$query)) { //if function returns true | '@' no error codes shown
            echo "<p>Blog posted</p>";
          }else {
            echo "<p>Blog not posted,yet</p>";
          }
        }
        mysqli_close($dbc);

      }else {
        echo "<p>error connecting to database: ".mysqli_connect_error()."</p>";
      }
    }
     ?>
     <form action="secure_data_entry5.php" method="POST">
      <p>Enter title:<input type="text" name="title"></p>
      <p>Enter entry:<textarea name="entry" cols="30" rows="5"></textarea></p>
      <p><input type="submit" name="submit" value="Post"></p>
     </form>




  </body>
</html>
