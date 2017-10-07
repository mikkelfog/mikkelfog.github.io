<?php
include('../includes/connection.php');

if (mysqli_connect_errno($con)) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "SELECT * FROM names";
$result=mysqli_query($con, $sql);
if (!$result) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
} else {
  echo mysqli_num_rows($result);
}
mysqli_close($con);
?>
