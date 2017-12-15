<?php
$numItems = 0;
$title = "shop";
include_once "./include/head.php";
?>

<!-- create containers for products -->

<div class="body-container">
  <div class="product-container">
<?php if (isset($_SESSION['u_id'])) { //if a user has logged in , show products
        include_once "./include/products.php";
        $cart = array();
      } else { //if user has NOT logged in, display 'must log in'
        echo "<h1 style='position:relative;left:3em;'>Must be Logged in to view content</h1>";
      }
?>
  </div>
</div>









<?php include_once "./include/footer.html"; ?>
