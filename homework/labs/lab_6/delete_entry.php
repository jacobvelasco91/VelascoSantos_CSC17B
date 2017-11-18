<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Delete an entry</title>
  </head>
  <body>
    <h1>Delete an Entry</h1>
    <?php
    $dbc = mysqli_connect("localhost","root","","myblog");
    //Using get function will check the url for name value pairs
    //is_numeric will check if a variable is a numeric value or numeric string
    //if both conditions are true, make query to select a record from table
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
      //This will grab data from the title and entry field, from the entries
      //table and where the row contains the certain 'ID' from the getmethod
      $query = "SELECT title,entry FROM entries WHERE id={$_GET['id']}";
      //return the result set into $result
      if ($result = mysqli_query($dbc,$query)) {
        //create an array from the result set | since its one record, no while loop is necessary
        $row = mysqli_fetch_array($result);
        echo "<form action='delete_entry.php' method='POST'>".
              "<p>Are you sure you want to delete this blog post?</p>".
              "<h3>{$row['title']}</h3>".
              "<p>{$row['entry']}</p>".
              "<input type='hidden' name='id' value='{$_GET['id']}'>".
              "<input type='submit' name='submit' value='delete this Entry!'>".
              "</form>";
      }else {
        echo "<p>Error in retreive the blog, because of error:".mysqli_error($dbc)."</p>";
      }

    }
    elseif (isset($_POST['id']) && is_numeric($_POST['id'])) {
      //creating query to delete the record indicated by the id num
      $query = "DELETE FROM entries WHERE id={$_POST['id']} LIMIT 1";
      $result = mysqli_query($dbc,$query);
      //report on execution
      if (mysqli_affected_rows($dbc) == 1 ) {
        echo "<p>The blog entry has been deleted</p>";
      } else {
        echo "<p style='color:red;'>Could not delete blog because:".mysqli_error($dbc)."</p>";
        echo "<p>The query being run was:".$query."</p>";
      }
    } else {
      echo "<p>No ID received</p>";
    }
    mysqli_close($dbc);
     ?>

  </body>
</html>
