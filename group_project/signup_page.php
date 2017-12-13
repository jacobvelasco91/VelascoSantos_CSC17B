<?php
$title = "Sign up";
include_once "./includes/head.html";
include_once "./includes/signup.php";
?>



  <div class="signup-container2">
  <h2 class="title1">Create your personal account.</h2>
    <?php
    if (isset($errors) && !empty($errors)) {
      echo "<div class='errors-container'>";
      echo "<p style='color:maroon'>The following must be corrected</p>";
      echo "<ol class='signup-errors'>";
       foreach ($errors as $value) {
         echo "<li>{$value}</li>";
       }
      echo "</ol>";
      echo "</div>";
    }?>
    <form style="padding:20px;" action="signup_page.php" method="post">
      <input class="input-text" type="text" name="username" placeholder="username" required><br>
      <input class="input-text" type="text" name="email" placeholder="email" required><br>
      <input class="input-text" type="password" name="password" placeholder="password" required><br>
      <input class="input-submit" type="submit" name="submit" value="Register!">
      <?php echo $signup_message; ?>
    </form>
  </div>
  <hr>
  <?php include_once "./includes/footer.html";?>
