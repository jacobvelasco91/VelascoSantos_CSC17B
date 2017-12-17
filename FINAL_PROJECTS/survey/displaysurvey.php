<?php
include_once "./includes/head.php";
//pull which survey id
$surID = $_GET['id'];
//pull survey from database
include_once "./includes/connect.php";
$sql = "SELECT * FROM s_survey WHERE id_survey='$surID'";
if ($result = $Conn->query($sql)) {
  $record = $result->fetch_assoc();
  //get all data and seperate it
  $title = $record['title'];
  $description = $record['description'];
  $questionArray = json_decode($record['questions']);
  $answersArray = json_decode($record['answers']);
  $_SESSION['numberQ'] = $questionArray;
echo "<div class='survey-container'>";
echo "<div class='survey-form'>";
echo "<h2>{$title}</h2><hr>";
echo "<h3>{$description}</h3>";
  $i = 0;
  echo "<form action='results.php' method='post'>";
  foreach ($questionArray as $q) {
    echo "<h4>".$q."</h4>";
    foreach ($answersArray[$i] as $key => $value) {
      echo "<input type='radio' name='q{$i}' value='{$value}'>".$value."<br>";
    }
    $i++;
  }
  echo "<input type='submit' name='submit-survey' value='finish'>";
  echo "</form>";
echo "</div>";
echo "</div>";
}
include_once "./includes/footer.php";
 ?>
