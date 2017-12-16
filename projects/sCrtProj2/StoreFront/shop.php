<?php
$title = "shop";
include_once "./include/head.php";
?>


<!-- create containers for products -->

<div class="body-container">
<?php if (isset($_GET['add'])) {
        switch ($_GET['add']) {
          case 'updatedproduct': echo "<h2 style='text-align:center;margin:2em;'>- Updated quantity of product -</h2>";break;
          case 'addedproduct': echo "<h2 style='text-align:center;margin:2em;'>- Added product to your cart -</h2>";break;default:break;
        }
      } else {
        echo "<h1 style='text-align:center;'>Quality that surpasses.</h1>";
      }
?>
  <div class="product-container">
<?php if (isset($_SESSION['u_id'])) { //if a user has logged in , show products
        include_once "./include/products.php";
      } else { //if user has NOT logged in, display 'must log in'
        echo "<h1 style='text-align:center;'>Must be Logged in to view content</h1>";
      }
?>
  </div>
</div>









<?php include_once "./include/footer.html"; ?>
