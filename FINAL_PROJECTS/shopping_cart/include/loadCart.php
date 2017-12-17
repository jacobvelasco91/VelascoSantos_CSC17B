

<div class="cart-container">
  <div class="contents-container">
    <h2>Contents</h2><hr>
<?php
//bring product contents from c_order | combine other tables
include_once "./include/connect.php";
$sql = "SELECT product_name,product_image,product_id2,product_price,product_quantity FROM items,c_order WHERE items.product_id=c_order.product_id";
if ($result=$Conn->query($sql)) {
  while ($record = $result->fetch_array()) {
    $price = $record['product_price'] * $record['product_quantity'];
    echo <<<_END
    <div class="product-slot">
      <div class="product-image">
      <img src="{$record['product_image']}" alt="{$record['product_name']}picture" width="150px" height="150px">
      </div>
      <div class="product-info">
        <span>{$record['product_name']}</span>
        <form action="./view_cart.php" method="get">
           <input type="text" name="qty" value="{$record['product_quantity']}">
           <input type="hidden" name="pID" value="{$record['product_id2']}">
           <input type="submit" name="submit" value="update">
        </form>
        <span>{$price}</span>
      </div>
    </div>
    <hr>
_END;
  }


} else {
  echo "keep trying, the lord is with you";
}
?>
</div>
  <div class="summary-container">
    <h2>Summary</h2><hr>
    <?php
      //pull order summary from database
      include_once "./include/connect.php";
      $sql = "SELECT product_name,product_quantity,product_price FROM items,c_order WHERE items.product_id=c_order.product_id";
      $result = $Conn->query($sql);
      $totalPrice = 0;
      while ($record = $result->fetch_array()) {
        $price = $record['product_quantity'] * $record['product_price'];
        echo <<<_END
        <p>{$record['product_name']}  x  {$record['product_quantity']} = {$price}</p>
_END;
$totalPrice = $totalPrice + $price;
      }

      echo "<hr>";
      echo "total = ".$totalPrice;
      echo "<p><a style='color:white;background-color:black;padding:3px;' href='./checkout.php'>checkout</a></p>";
     ?>

  </div>

</div>
