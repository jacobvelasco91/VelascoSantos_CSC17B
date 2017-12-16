<?php
//get all records from database
include_once "./include/connect.php";
$query = "SELECT * FROM items";
if ($result = $Conn->query($query)) {
  while ($record = $result->fetch_assoc()) {
    $id = $record['product_id'];
    echo <<<_END
    <div class="product">
      <h1>{$record['product_name']}</h1>
      <div class="product-image">
        <img src="{$record['product_image']}" alt="product image">
      </div>
      <h2>{$record['product_type']}</h2>
      <p>{$record['product_description']}</p>
      <h3>\${$record['product_price']}</h3>
      <h2><a href="./include/addcart.php?product_id={$id}">add to cart</a></h2>
    </div>
_END;
  }
}
 ?>
