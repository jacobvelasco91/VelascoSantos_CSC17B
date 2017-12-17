<?php
$title = "home";
include_once "./includes/head.php";
$idu = $_SESSION['u_id'];
include_once "./includes/connect.php";
$sql = "SELECT * FROM s_survey WHERE id_user='$idu'";
if ($result = $Conn->query($sql)) {
  $rows = $result->num_rows;
  if ($rows > 0) {
    $viewsurvey = "<div class='view-survey'>
      <a href='./viewSurvey.php'>View Surveys</a>
    </div>";
  } else {
    $viewsurvey = "";
  }
} else {
  echo "didnt work";
}
 ?>


 <div class="choice-survey">
   <div class="create-survey">
     <a href="./createSurvey1.php">Create Survey</a>
   </div>
  <?php echo $viewsurvey; ?>
 </div>

 <?php include_once "./includes/footer.php"; ?>
