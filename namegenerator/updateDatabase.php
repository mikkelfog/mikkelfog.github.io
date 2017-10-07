<?php
session_start();
include('../includes/connection.php');

if(array_key_exists("content", $_POST)) {
  $query = "INSERT INTO favorites (USER_ID, child_name)
  VALUES
  (
    '".mysqli_real_escape_string($con, $_SESSION['id'])."',
    '".mysqli_real_escape_string($con, $_POST['content'])."'
    )";

  mysqli_query($con, $query);

}

 ?>
