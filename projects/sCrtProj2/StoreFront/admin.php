<?php
$title = "Admin";
$numItems = 0;
include_once "./include/head.php";
include_once "./include/connect.php";
 ?>

 <!-- content to add products to website -->

<div class="admin-form">
  <?php include_once "./include/admin_add.php";
        include_once "./include/admin_edit.php";
        include_once "./include/admin_delete.php";
        $Conn->close();
  ?>
</div>

<div class="admin-choice">
  <div class="choice">
    <a href="admin.php?add=true">add</a>
    <a href="admin.php?edit=true">edit</a>
    <a href="admin.php?delete=true">delete</a>
  </div>
</div>
