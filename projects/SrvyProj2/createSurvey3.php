<?php
$title = "create survey";
include_once "./includes/head.php";
include_once "./includes/back.php";
 ?>
<?php
 if (isset($_POST['qcon']) ) {
   $numQ = $_GET['q'];
   echo "<h2>Title : ".$_SESSION['info']['title']."</h2>";
   echo "<h2>Description : ".$_SESSION['info']['description']."</h2>";
   echo "<form action='./createSurvey.php?q={$numQ}' method='post'>";
   $_SESSION['question'] = array();
   for ($i=1; $i < $numQ+1; $i++) {
     $question = $_POST["q$i"];
     $numAnswer = $_POST["a$i"];
     //session variable 'question' holds arrays from '$question' 1,2,3,4 each is an array
     $_SESSION['question'][$i]= array('q'=>$i,'question'=>$question,'numAn'=>$numAnswer);
     //display the question and the text boxces for that question
     echo "<p>{$i}.{$question}</p>";
     for ($j=1; $j <$numAnswer+1 ; $j++) {
       echo "<input type='text' name='q{$i}a{$j}' placeholder='answer{$j}'><br>";
     }
   }
   echo "<input type='submit' name='submit-survey' value='create survey!'>";
   echo "</form>";












   /*
   foreach ($_SESSION['question'] as $value) {
     foreach ($value as $key => $value1) {
       echo $key.":".$value1;
     }
   }*/



  }
  include_once "./includes/footer.php";
 ?>
