<?php
session_start();
include('../includes/connection.php');
include('../includes/header.php');
include('../includes/nav.php');
?>
<div class="row">

  <div class="col-md-2">
  </div>

  <div class="col-md-8 php">
    <h1 class="display-4">Your Saved Favorite Names</h1>
    <div class="largefont boldfont">
        <ul>
          <?php
            // Check connection
             if (mysqli_connect_errno($con)) {
                 echo "Failed to connect to MySQL: " . mysqli_connect_error();
             }
             //Get rows
             $sql="SELECT nameID FROM favorites where USER_ID ='".mysqli_real_escape_string($con, $_SESSION['id'])."'";
             $result=mysqli_query($con, $sql);

             //loop through array of rows
             while($row = mysqli_fetch_array($result)) {
              echo "<li>".$row['nameID']."</li>";
             }
             mysqli_close($con);
           ?>
         </ul>
     </div>
   </div>

   <div class="col-md-2">
   </div>

</div>

<?php
 include('../includes/scripts.php');
 include('../includes/footer.php');
?>
