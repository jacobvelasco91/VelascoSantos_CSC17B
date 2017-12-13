<?php
include_once "./include/newProduct.php";
//if 'add' is a valid value and it = true go into if statement | grab contents from url
if (isset($_GET['edit']) && $_GET['edit'] == true) {
  //check if any updates have been made | update any edit submitted
  if (isset($_POST['submit_edit'])) {
    $uPro = new NewProduct($Conn);
    //update database
    $query = "UPDATE items SET
    product_name='{$uPro->getpName()}',
    product_type='{$uPro->getpType()}',
    product_price='{$uPro->getpPrice()}',
    product_image='{$uPro->getpImage()}',
    product_description='{$uPro->getpDescription()}'
    WHERE product_id='{$_GET["id"]}'";
    //if there was a submited post edit, then let the admin know
    if ($result = $Conn->query($query)) {
      echo "updated!";
    }
    else {
      echo $Conn->error;
    }
  }

  //show databse infortion of products in a table
  $query = "SELECT* FROM items";
  if ($result = $Conn->query($query)) {
    echo "<table>";
    echo "<tr>";
    echo "<th>Product Name</th><th>Product Type</th><th>Product Price</th><th>edit</th>";
    while ($record = $result->fetch_assoc()) {
      $id = $record['product_id'];
      echo <<<_start
      <tr>
      <td>{$record['product_name']}</td>
      <td>{$record['product_type']}</td>
      <td>{$record['product_price']}</td>
      <td><form action='./admin.php?edit=true&id={$id}' method='post'>
      <input type='submit' name='update' value='edit'></form></td>
      </tr>
_start;
    }
  }
  echo "</table>";
  //
    if (isset($_POST['update'])) {
      $id = $_GET['id'];
      $query = "SELECT * FROM items WHERE product_id='{$id}'";
      if ($result = $Conn->query($query)) {
        $record = $result->fetch_array();
          echo <<<_END
          <form class="add-form" action="./admin.php?edit=true&id={$id}" method="post">
            <input class="add-text" type="text" name="product_name" placeholder="Product Name" value="{$record['product_name']}" required><br>
            <input class="add-text" type="text" name="product_type" placeholder="Type" value="{$record['product_type']}" required><br>
            <input class="add-text" type="text" name="product_price" placeholder="price" value="{$record['product_price']}" required><br>
            <input class="add-text" type="text" name="product_image" placeholder="image url" value="{$record['product_image']}" ><br>
            <textarea class="product-description" name="product_description" cols="100" rows="5" placeholder="describe product" required>{$record['product_description']}</textarea><br>
            <input type="submit" name="submit_edit" value="post">
          </form>
_END;
      }
    }
}

 ?>
