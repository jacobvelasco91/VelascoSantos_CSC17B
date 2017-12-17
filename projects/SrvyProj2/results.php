<?php
$title = "results";
include_once "./includes/head.php";
include_once "./includes/connect.php";
 ?>
 <div style="margin-right:auto;margin-left:auto;width:50%;background-color:lightgray;text-align:center">

 <h1>Results</h1>
 <?php
if (isset($_POST['submit-survey'])) {
  $numQ = count($_SESSION['numberQ']);
  for ($i=0; $i < $numQ ; $i++) {
    $i +=1;
    echo "<p>question {$i}:";
    $i -=1;
    echo $_POST["q{$i}"]."</p><br>";
  }
}
  ?>
</div>




 <?php include_once "./includes/footer.php"; ?>
