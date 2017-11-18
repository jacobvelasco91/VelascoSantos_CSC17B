<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Viewing Blog entries</title>
  </head>
  <body>
    <h1>My Blog</h1>
    <?php
    //connecting to database
    $dbc = mysqli_connect("localhost","root","","myblog");
    //creating the sql command | the query
    $query = "SELECT * FROM entries ORDER BY date_entered DESC";
    //if executing the query returns true store in result, run code
    if ($result = mysqli_query($dbc,$query)) {
      //fetch the results with the mysqli_fetch_array function, use while loop
      while($row = mysqli_fetch_array($result)){
        echo "<p><h3>{$row['title']}</h3>
                {$row['entry']}<br>
                <a href=\"edit_entry.php?id={$row['id']}\">Edit</a>
                <a href=\"delete_entry.php?id={$row['id']}\">Delete</a>
                <hr>
              </p>";
      }
    }
    else {
      echo "<p style='color:red;'>Could not retrieve entries because data:".mysqli_error($dbc)."</p>";
    }
    mysqli_close($dbc);

    ?>
  </body>
</html>
