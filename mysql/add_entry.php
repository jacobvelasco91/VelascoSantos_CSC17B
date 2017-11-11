<!-- PHP for the web, pg 360-365-->
<!--This file demonstrates how you can add data to a database through a form-->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add a blog entry</title>
  </head>
  <body>
    <h1>Add a Blog Entry</h1>

    <?php
    //checks if a form has been submitted | checks for post, if post was used
    if ($_SERVER['REQUEST_METHOD'] == 'POST') { //Handle the form

      //Validate the form data
      $problem = false;
      //strip_tags will completely take away any html/php tags
      //trim will trim off extra white space from both beginning & end of string
      if(!empty($_POST['title']) && !empty($_POST['entry'])){
        $title = trim(strip_tags($_POST['title']));
        $entry = trim(strip_tags($_POST['entry']));
      }else{
        echo '<p style="color:red;"> Please submit both a title and entry.</p>';
        $problem = true;
      }
      if (!$problem) { //if $problem is not true, run code
        //Connect to database
        $dbc = mysqli_connect("localhost","root","","myblog");
        //Make a Query
        $query = "INSERT INTO entries (id,title,entry,date_entered) VALUES (0,'$title','$entry',NOW())";
        //Execute the query
          if (@mysqli_query($dbc,$query)) { //if the 'sqli_query' returned a true statement
            echo "The blog has been added";
          }else {
            echo "<p style='color:red;'>Could not add entry because:<br>".mysqli_error($dbc)."</p>";
            echo "<p>The query being run was:".$query."</p>";
          }
          mysqli_close($dbc); //closing database connection
      } // No problem!
    } //End of FORM IF.


    //Display FORM
     ?>
     <form action="add_entry.php" method="post">
       <p>Entry Title:<input type="text" name="title" size="40" maxsize="100"></p>
       <p>Entry Text:<textarea name="entry" cols="40" rols="5"></textarea></p>
       <input type=submit name="submit" value="Post this Entry!">
     </form>


  </body>
</html>
