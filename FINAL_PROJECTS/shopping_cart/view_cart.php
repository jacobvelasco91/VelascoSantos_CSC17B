<?php
/*****before loading this page we 'db_cart.php' | used contents of sessions 'cart' ****/

//header and all linked files
$title = "cart";
$updatemsg = "";
include_once "./include/head.php";
include_once "./include/updateCart.php";
echo $updatemsg;
//if user has not logged in, tell them to go shop | cart content will be empty
if (!isset($_SESSION['u_id'])) {
  echo "<h1 style='text-align:center;margin-top:2em;'>Go Shop!</h1>";
} else { //logged in
  //if 'cart' sessions has no contents, display empty cart (user has not added anything)
  if (!isset($_SESSION['cart'])) {
    echo "<h1 style='text-align:center;margin-top:2em;'>Shopping Cart currently empty</h1>";
  } else { //user has added products to the sessions 'cart'
    echo "<h1 style='text-align:center;margin-top:2em;margin-bottom:2em;'>Shopping Cart</h1>";
    include_once "./include/loadcart.php";
  }
}
 ?>














<?php
include_once "./include/footer.html";
 ?>
