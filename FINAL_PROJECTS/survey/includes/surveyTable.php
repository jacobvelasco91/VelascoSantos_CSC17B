<?php
include_once "./includes/connect.php";
$id = $_SESSION['u_id'];
$sql = "SELECT id_survey,title FROM s_survey WHERE id_user='{$id}'";
if ($result = $Conn->query($sql)) {
  echo "<table>";
  echo "<tr><th>survey</th><th>Title</th><th>option</th></tr>";
  while ($record = $result->fetch_assoc()) {
    $idS = $record['id_survey'];
    echo "<tr>";
    echo "<td>{$record['id_survey']}</td><td>{$record['title']}</td>";
    echo "<td><form action='displaysurvey.php?id={$idS}' method='post'><input type='submit' name='display' value='display'></form></td>";
    echo "</tr>";
  }
  echo "</table>";
}

 ?>
