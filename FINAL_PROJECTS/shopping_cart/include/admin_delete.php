<?php
if (isset($_GET['delete']) == true ) {
    if (isset($_POST['delete'])) {
      //grab product_id
      $id = $_GET['id'];
      //create query to delete
      $query = "DELETE FROM items WHERE product_id='{$id}' LIMIT 1";
      if ($result = $Conn->query($query)) {
        echo "<p>product deleted.</p>";
      }
    }
  $query = "SELECT* FROM items";
  if ($result = $Conn->query($query)) {
    echo "<table>";
    echo "<tr>";
    echo "<th>Product Name</th><th>Product Type</th><th>Product Price</th><th>delete</th>";
    while ($record = $result->fetch_assoc()) {
      $id = $record['product_id'];
      echo <<<_start
      <tr>
      <td>{$record['product_name']}</td>
      <td>{$record['product_type']}</td>
      <td>{$record['product_price']}</td>
      <td><form action='./admin.php?delete=true&id={$id}' method='post'>
      <input type='submit' name='delete' value='delete'></form></td>
      </tr>
_start;
    }
    echo "</table>";
  }
}
 ?>
