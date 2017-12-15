<?php
$title = "Sign up";
$numItems = 0;
include_once "./include/head.php";
include_once "./include/signup.php";
?>

<!-- signup section -->
  <div class="signup-container2">
    <form class="signup-form" style="padding:20px;" action="signup_page.php" method="post">
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
      <input class="input-text" type="text" name="firstname" placeholder="firstname" value="<?php echo $firstname;?>"required><br>
      <input class="input-text" type="text" name="lastname" placeholder="lastname" value="<?php echo $email; ?>" required><br>
      <input class="input-text" type="text" name="email" placeholder="email" value="<?php echo $lastname; ?>" required><br>
      <input class="input-text" type="password" name="password" placeholder="password" required><br>
      <input class="input-submit" type="submit" name="submit" value="Register!">
      <?php echo "<p>$signup_message</p>"; ?>
    </form>
  </div>
  <hr>
  <?php include_once "./include/footer.html";?>
