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
      <h1 class="display-4">Profile</h1>
      <div class="largefont">
          <?php

              $retrieveQuery = "SELECT * from users where id ='".mysqli_real_escape_string($con, $_SESSION['id'])."'";
              if($retrieveResult = mysqli_query ($con, $retrieveQuery)) {
                $row = mysqli_fetch_array($retrieveResult);
                ?>
                <p>You're logged in with this email: <?php echo $row['email']; ?></p>
              <?php
            }
              if (array_key_exists('id', $_SESSION)) {
                echo "<br><a href='logout.php?logout=1'>Log out</a><br>";
              } else {
                header('Location: index.php');
              }

              if (array_key_exists('id', $_COOKIE)) {
                  echo "We've created a cookie - you'll stay logged in after you close this browser window<br>";
                } else {
                  echo "you have to log in again if you close this browser window";
                }

           ?>
         </div>
      </div>

      <div class="col-md-2">
      </div>

    </div>

<?php
 include('../includes/scripts.php');
 include('../includes/footer.php');
?>
