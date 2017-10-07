<?php

<?php
include('../includes/connection.php');

$queryParameters = $_REQUEST['parametersArray'];
print_r($queryParameters);

if (mysqli_connect_errno($con)) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if(array_key_exists("content", $_POST)) {
  $query = "INSERT INTO favorites (USER_ID, nameID) VALUES ($queryParameters[0], $queryParameters[1])";
  mysqli_query($con, $query);
  echo "inserted succesfully";
}

 ?>
