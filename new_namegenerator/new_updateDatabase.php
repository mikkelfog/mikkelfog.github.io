<?php
session_start();
include('../includes/connection.php');

if(array_key_exists("content", $_POST)) {
  $query = "INSERT INTO favorites (USER_ID, nameID)
  VALUES
  (
    '".mysqli_real_escape_string($con, $_SESSION['id'])."',
    '".mysqli_real_escape_string($con, $_POST['content'])."'
    )";
  $result = mysqli_query($con, $query);
  if($result)
    {
      echo "Success";
    }
  else
    {
      echo "Error";
    }
}
 ?>
