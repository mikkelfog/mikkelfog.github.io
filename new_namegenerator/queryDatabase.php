<?php
include('../includes/connection.php');

$queryParameters = $_REQUEST['parametersArray'];
// print_r($queryParameters);

if (mysqli_connect_errno($con)) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//Get rows
// $sql = "SELECT $queryParameters[0] FROM $queryParameters[1]";
// if ($queryParameters[2] !== ""){
//   $sql = $sql. " where $queryParameters[2] = $queryParameters[3]";
//   if ($queryParameters[4] !== ""){
//     $sql = $sql. " and $queryParameters[4] = $queryParameters[5]";
//   }
// }
$sql = "SELECT * FROM names where nameID = $queryParameters[0]";
$result=mysqli_query($con, $sql);
if (!$result) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
} else {
  $row = mysqli_fetch_array($result);
  echo $row['name'];
}
mysqli_close($con);
// //loop through array of rows
//   while($row = mysqli_fetch_array($result)) {
//      "<li>".print_r($row)."</li>";
//   }
?>
