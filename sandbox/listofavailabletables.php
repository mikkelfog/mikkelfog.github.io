<?php
include('../includes/connection.php');
 $sql = "SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'jumifo_dk_db2'";
 $result = mysqli_query($con, $sql);

 while ( $tables = $result->fetch_assoc())
 {
     echo "<li>".$tables['TABLE_NAME']."</li>";
 }
?>
