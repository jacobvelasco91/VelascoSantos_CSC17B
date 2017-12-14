<?php
include_once "./include/connect.php";
$list = array();
//get all records from database
$query = "SELECT * FROM items";
if ($result = $Conn->query($query)) {
  while ($record = $result->fetch_assoc()) {
    $id = $record['product_id'];
    echo <<<_END
    <div class="product">
      <p>{$record['product_name']}</p>
      <div class="product-image">
        <img src="{$record['product_image']}" alt="product image">
      </div>
      <p>{$record['product_type']}</p>
      <p>{$record['product_description']}</p>
      <p>{$record['product_price']}</p>
      <p><a href="./shop.php?id={$id}">add to cart</a></p>
    </div>
_END;
  }
}
 ?>
