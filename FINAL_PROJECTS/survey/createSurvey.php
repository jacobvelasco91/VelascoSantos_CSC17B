<?php
//This will create the survey and insert it into the database
session_start();

if (isset($_POST['submit-survey'])) {
  $title = $_SESSION['info']['title'];
  $description = $_SESSION['info']['description'];



  //pulling contents from SESSION | first grab number of questions
  $numQ = $_GET['q'];
  $allAnswers = array(); //this array has to be outside of loops so data doesnt re-write
  $allquestions = array(); //this array has to be outside to avoid data re-write

  for ($i=1; $i < $numQ+1; $i++) {
    $whichq = $_SESSION['question'][$i]['q']; //which question are we in?
    $howmanyA = $_SESSION['question'][$i]['numAn']; //how many answers does this question have?
    $question = $_SESSION['question'][$i]['question'];


    //loop through POST to get all submitted answers for current question
    $cAnswers = array(); //new question causes this new instance of the array
    for ($j=1; $j < $howmanyA+1 ; $j++) {
      $currentQnA = "q{$i}a{$j}";
      $cAnswers[] = $_POST["$currentQnA"];
    }


    //place the $cAnswers array into the $allAnswers array | this creates two-dim arry
    $allAnswers[] = $cAnswers;
    $allquestions[] = $question;

  } //end of looping through questions
  /*
  $i = 0;
  foreach ($allquestions as $q) {
    echo $q."<br>";
    foreach ($allAnswers[$i] as $value) {
      echo $value."<br>";
    }
    $i++;
  }*/

  //transfer this arrays to a cookie by JSON then send to another page , that page will
  //use javascript to get the contents of the cookie and display the survey form.

  //or send the information here to a database , then pull from the view surveys and do above

  //pull data, shove into setcookie , grab with javascript
  //grab the user id
  $u_id = $_SESSION['u_id'];
  //convert arrays to JSON strings.
  $questionsJSON = json_encode($allquestions);
  $answersJSON = json_encode($allAnswers);
  //create sql to insert survey into database
  include_once "./includes/connect.php";
  $sql = "INSERT INTO s_survey (id_user,title,description,questions,answers)
          VALUES ('{$u_id}','{$title}','$description','$questionsJSON','$answersJSON')";
  if ($result=$Conn->query($sql)) {
    $_SESSION['view'] = true;
    header("location: ./home.php");
  }







}
include_once "./includes/footer.php";

 ?>

 <!--here i will create a a javascript survey object | but first create the class-->
