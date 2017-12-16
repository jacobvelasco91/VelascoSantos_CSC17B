<?php
session_start();
//checking if an product was added | if it was added the id # will be in the url
if (isset($_GET['product_id'])) {
  //assign the product id to $productID
  $productID = $_GET['product_id'];


  //Now check if that product_id is already set | if true, just increment the quantity
  if (isset($_SESSION['cart'][$productID])) {

    //grab session data for quantity
    $_SESSION['cart'][$productID]['quantity']++;
    $newQuantity = $_SESSION['cart'][$productID]['quantity'];

    //create sql to update c_order table | execute in where u_id and product_id
    include_once "./connect.php";
    $sql = "UPDATE c_order SET product_quantity={$newQuantity} WHERE product_id={$productID} AND id_user={$_SESSION['u_id']}";
    $result = $Conn->query($sql);
    $Conn->close();

    //echo $_SESSION['cart'][$productID]['quantity'];
    header("location: ../shop.php?add=updatedproduct");
  }

  //The product_id from the url has not been set | new product being added
  else {
    //store into c_order table
    include_once "./connect.php";
      //store into session & database
      $_SESSION['cart'][$productID] = array('product'=>$productID,'quantity'=>1);
      $u_id = $_SESSION['u_id'];
      $sql = "INSERT INTO c_order (id_user,product_id,product_quantity) VALUES ('{$u_id}','{$productID}',1)";
      $result = $Conn->query($sql);
      $Conn->close();
      header("location: ../shop.php?add=addedproduct");
  }
}






/*else {
  //bring price from database
  include_once "./connect.php";
  $sql = "SELECT product_price FROM items WHERE product_id='{$productID}'";
  if ($result = $Conn->query($sql)) {
    //list will extract each value from array starting at the left | placed in variables
    list($price) = $result->fetch_array();
    //store into cart
    $_SESSION['cart'][$productID] = array('product'=>$productID,'quantity'=>1,'price'=>$price);
    $u_id = $_SESSION['u_id'];
    $sql = "INSERT INTO c_order (id_user,product_id,product_price,product_quantity)
                          VALUES('{$u_id}','{$productID}','{$price}',1)";
    $result = $Conn->query($sql);
    $Conn->close();
    header("location: ../shop.php?add=addedproduct");

  }
}*/
?>
