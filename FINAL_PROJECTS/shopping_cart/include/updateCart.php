<?php
if (isset($_GET['submit']) && $_GET['submit'] == "update") {
  $pID = $_GET['pID'];
  $qty = $_GET['qty'];
  //update database
  include_once "./include/connect.php";
  $sql = "UPDATE c_order SET product_quantity={$qty} WHERE product_id={$pID}";
  if ($result = $Conn->query($sql)) {
    $updatemsg = "<p>updated cart</p>";
    header("location: ./view_cart.php");
  }
}

 ?>
