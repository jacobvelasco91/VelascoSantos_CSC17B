

<div class="cart-container">
  <div class="contents-container">
<?php


//bring product contents from c_order | combine other tables
include_once "./include/connect.php";
$sql = "SELECT product_name,product_image,product_price,product_quantity FROM items,c_order WHERE items.product_id=c_order.product_id";
if ($result=$Conn->query($sql)) {
  while ($record = $result->fetch_assoc()) {
    echo <<<_END
    <h1>{$record['product_name']}</h1>
    <img src="{$record['product_image']}" alt="{$record['product_name']}picture" width="50px" height="50px">
    <p></p>
_END;
  }

} else {
  echo "keep trying, the lord is with you";
}



?>

  </div>
  <div class="summary-container">

  </div>

</div>
