<?php
$title = "create survey";
include_once "./includes/head.php";
include_once "./includes/back.php";
 ?>

<?php
 if (isset($_POST['submit']) ) {
   $title = $_POST['survey-title'];
   $description = $_POST['survey-description'];
   $numQ = $_POST['num-survey-questions'];
   $_SESSION['info'] = array('title'=>$title,'description'=>$description);
   echo "<a href='./createSurvey1.php'>go back</a>";
   echo "<h2>Title : {$title}</h2>";
   echo "<h2>Description : {$description}</h2>";
   echo "<form action='./createSurvey3.php?q={$numQ}' method='post'>";
   for ($i=1; $i < $numQ+1; $i++) {
     echo <<<_END
       <p>q{$i} : <input type="text" name="q{$i}" cols="50">
       # of answers? <input type="number" name="a{$i}"></p>
_END;
   }
   echo "<input type='submit' name='qcon' value='continue'></form>";
 }
?>
