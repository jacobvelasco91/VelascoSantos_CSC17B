<?php
$title = "Sign up";
include_once "./includes/head.html";
include_once "./includes/signup.php";
?>
<!-- title header w/ video -->
<header>
  <video width="auto" height="auto" autoplay loop >
    <source src="./zelda_images/zelda_promo1.mp4" type="video/mp4">
    Your browser does not support the video tag.
  </video>
</header>
<h1 class="title">Zelda for the Modern Gamer</h1>
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
      <input class="input-text" type="text" name="username" placeholder="username" value="<?php echo $username;?>"required><br>
      <input class="input-text" type="text" name="email" placeholder="email" value="<?php echo $email; ?>" required><br>
      <input class="input-text" type="password" name="password" placeholder="password" required><br>
      <input class="input-submit" type="submit" name="submit" value="Register!">
      <?php echo "<p>$signup_message</p>"; ?>
    </form>
  </div>
  <hr>
  <?php include_once "./includes/footer.html";?>
