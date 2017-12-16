<?php
//check inserting current order detail into database | using $_SESSION['cart'] array with arrays
session_start();
//if 'u_id' is not set send to shop.php | shop.php will take care of results
if (!isset($_SESSION['u_id'])) {
  header("location: ../view_cart.php");
}elseif (!isset($_SESSION['cart'])) { //if 'cart' is not set send to shop.php | it display msg
  header("location: ../view_cart.php");
}
else { //both 'u_id' and 'cart' have been set | we have user and products

  /*//get all data from sessions | get products in 'cart' array
  $numProducts = count($_SESSION['cart']);
  //connect to database
  include_once "./connect.php";
  foreach ($_SESSION['cart'] as $productArray) {
    foreach ($productArray as $field => $value) {
      //create sql to insert into c_order table
      $sql = "INSERT INTO c_order (product_id,product_price,product_quantity)
              VALUES('{$field}','{$}')"

    }
  }*/


  echo "ready to insert current order into database";
}
 ?>
