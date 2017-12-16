<?php
session_start();

if (isset($_POST['submit-survey'])) {
  $title = $_SESSION['info']['title'];
  $description = $_SESSION['info']['description'];
  $numQ = $_GET['q'];
  echo $numQ;
  //pulling contents from SESSION
  for ($i=1; $i < $numQ+1; $i++) {
    $q = $_SESSION['question'][$i]['question'];
    echo $q;
  }
  /*
  echo $title.":".$description.":".$numQuestions;
  for ($i=1; $i <$numQuestions+1 ; $i++) {
    $q = "q{$i}";
    $question = $_SESSION['question'][$q]['numAn'];
    $numAnswer = $_SESSION['question']["q{$i}"]['numAn'];
    echo $question.":".$numAnswer;
  }*/
}

 ?>
