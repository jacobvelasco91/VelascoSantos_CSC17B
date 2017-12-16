<?php
$title = "create survey";
include_once "./includes/head.php";
include_once "./includes/back.php";
 ?>

<?php
if (!isset($_POST['submit'])) {
  echo <<<_END
  <form class="survey-form" action="./createSurvey2.php" method="post">
    <p>Title</p>
    <input type="text" name="survey-title" placeholder="title">
    <p>purpose/description of survey</p>
    <textarea name="survey-description" rows="4" cols="80" placeholder="description"></textarea>
    <p>How many questions?</p>
    <input type="number" name="num-survey-questions" value=1>
    <input type="submit" name="submit" value="continue">
  </form>
_END;
}
?>
