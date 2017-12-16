<?php
include_once "./include/head.php";
?>

<h1>Checkout</h1><hr><br>

<div class="checkout">
<?php
//create query to pull data
  include_once "./include/connect.php";
  $sql = "SELECT product_name,product_quantity,product_price FROM items,c_order WHERE items.product_id=c_order.product_id";
  $result = $Conn->query($sql);
  $totalPrice = 0;
  while ($record = $result->fetch_array()) {
    $price = $record['product_price'] * $record['product_quantity'];
    $totalPrice = $totalPrice + $price;
  }
  $shipping = 4.00;
  $grandtotal = $totalPrice + $shipping;
  echo "<p>items      x  {$numItems}</p><hr>";
  echo "<p>Subtotal       \${$totalPrice}</p>";
  echo "<p>shipping       \${$shipping}</p><hr>";
  echo "<p>Total           <h3>\${$grandtotal}</p>";

  $sql = "DELETE FROM c_order WHERE id_user={$_SESSION['u_id']}";
  $result = $Conn->query($sql);
  $Conn->close();


 ?>
</div>




<?php include_once "./include/footer.html"; ?>
