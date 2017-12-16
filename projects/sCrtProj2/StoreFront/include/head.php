<?php
session_start();
//check if user has logged in | if they have, 'u_id' will contain their user_id
if (isset($_SESSION['u_id'])) {
  $log = "<a href='./include/logout.php'>logout</a>"; //option for user to log out
  //updating the cart amount
  if (isset($_SESSION['cart'])) {
    //bringing in data from c_order for current 'u_id' adding up product_quantity
    include_once "./include/connect.php";
    $sql = "SELECT product_quantity FROM c_order WHERE id_user={$_SESSION['u_id']}";
    $result = $Conn->query($sql);
    $numItems = 0;
    while ($record = $result->fetch_assoc()) {
      $itemC = $record['product_quantity'];
      $numItems =$numItems + $itemC;
    }
  }else {
    $numItems = 0;
  }
} else {
  $numItems = 0;
  $log = "<a href='./login_page.php'>login / sign up</a>";
}

 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <meta charset="utf-8">
    <title>Fresh Bread co. | <?php echo $title; ?></title>
      <link rel="stylesheet" href="./css/reset.css" type="text/css">
      <link rel="stylesheet" href="./css/homepage.css" type="text/css">
      <link rel="stylesheet" href="./css/display_products.css" type="text/css">
      <link rel="stylesheet" href="./css/footer.css" type="text/css">
      <script src="./include/javascript/addCart.js"></script>
      <link rel="stylesheet" href="./css/display_cart.css" type="text/css">

    <link rel="stylesheet" href="./css/admin.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
  </head>
  <body>
    <header>
      <div class="header-title">
        <a style="text-decoration:none;color:black;" href="./index.php"><h1>Fresh Bread Co.</h1></a>
      </div>
      <div class="nav">
        <nav class="header-nav">
          <?php echo $log; ?>
          <a href="./shop.php">shop</a>
          <a href="./view_cart.php">(<?php echo $numItems; ?>) cart <img src="./images/cart.png" alt="cart"> </a>
        </nav>
      </div>
    </header>
    <hr>
