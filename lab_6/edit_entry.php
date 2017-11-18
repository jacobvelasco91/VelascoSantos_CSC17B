<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Edit Entry</title>
  </head>
  <body>
    <h1>Edit Entry</h1>
    <?php
    //Connect to database
    $dbc = mysqli_connect("localhost","root","","myblog"); //**** make sure database is correct****
    //set charset | to use mysqli_real_escape_string()
    mysqli_set_charset($dbc,'utf-8');
    //enter if there is an id in the url
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
      //display the entry to be updated  | get info from database first
      $query = "SELECT title,entry FROM entries where id={$_GET['id']}";
      if ($result = mysqli_query($dbc,$query)) {
        $row = mysqli_fetch_array($result);
        echo "<form action='edit_entry.php' method='POST'>".          //****** make sure echo has correct ending or concatination
             "<p>Enter Title: <input type=text name=title value='{$row['title']}'></p>".
             "<p><textarea name=entry cols='40' rows='5'>".htmlentities($row['entry'])."</textarea></p>".
             "<p><input type='hidden' name='id' value='{$_GET['id']}'></p>".
             "<p><input type='submit' name='submit' value='update entry!'></p>".
             "</form>";
      } else {
        echo "<p>Could not retreive blog post because:".mysqli_error($dbc)."</p>";
      }

    }
    //If form was submitted | It will go to this if clause becuase the GET will be empty
    elseif (isset($_POST['id']) && is_numeric($_POST['id'])) {
      $problem = false; //problems false means you can continue with code to update
      if (!empty($_POST['title']) && !empty($_POST['entry'])) {
        $title = mysqli_real_escape_string($dbc,trim(strip_tags($_POST['title']))); //****mysqli_real_escape_string requires 2 arguments!
        $entry = mysqli_real_escape_string($dbc,trim(strip_tags($_POST['entry'])));
      }else {
        echo "<p>You must enter a new blog post</p>";
        $problem = true; //problem true means there is a problem and you cannot move onto update
      }
      if (!$problem) {
        //define sql command | make sure you are updated one record with the id
        $query = "UPDATE entries SET title='$title',entry='$entry' WHERE id='{$_POST['id']}'"; //***got new info in post , thrown into variables
        $result = mysqli_query($dbc,$query); //executing the query
        if (mysqli_affected_rows($dbc) == 1) {
          echo "<p>The blog entry has been updated</p>";
        } else {
          echo "<p>There was an error with updated the blog:".mysqli_error($dbc)."</p>";
        }
      }
    } else {
      echo "<p>This page was accessed in error</p>";
    }
    mysqli_close($dbc);
     ?>
  </body>
</html>
