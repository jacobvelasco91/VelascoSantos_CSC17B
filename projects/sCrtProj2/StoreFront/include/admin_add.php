<?php
include_once "./include/newProduct.php";
//if 'add' is a valid value and it = true go into if statement | grab contents from url
if (isset($_GET['add']) && $_GET['add'] == true) {
    //create form
    echo <<<_END
    <form class="add-form" action="./admin.php?add=true" method="post">
      <input class="add-text" type="text" name="product_name" placeholder="Product Name" required><br>
      <input class="add-text" type="text" name="product_type" placeholder="Type" required><br>
      <input class="add-text" type="text" name="product_price" placeholder="price" required><br>
      <input class="add-text" type="text" name="product_image" placeholder="image url" ><br>
      <textarea class="product-description" name="product_description" cols="70" rows="5" placeholder="describe product" required></textarea><br>
      <input type="submit" name="submit" value="post">
    </form>
_END;
//if admin posts create query to submit into database
  if (isset($_POST['submit'])) {
    $product = new NewProduct($Conn);
    //create query
    $query = "INSERT INTO items (product_name,product_type,product_description,product_image,product_price) VALUES ('{$product->getpName()}','{$product->getpType()}','{$product->getpDescription()}','{$product->getpImage()}','{$product->getpPrice()}')";
    //execute query
    if ($result = $Conn->query($query)) {
      echo "<p>product posted!</p>";
    }else {
      echo "<p>uh-oh, couldnt post at the moment.<p>";
      echo $Conn->error;
    }
  }
}
 ?>
