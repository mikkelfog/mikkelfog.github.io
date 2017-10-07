<?php
session_start();
include('./includes/connection.php');
include('./includes/signupLogin.php');

if (array_key_exists("logout", $_GET)) {
  unset($_SESSION);
  setcookie('id', "", time()-60*60);
  $_COOKIE['id'] = "";
} else if ((array_key_exists("id", $_SESSION) AND $_SESSION['id']) OR (array_key_exists("id", $_COOKIE) AND $_COOKIE['id'])) {
  header('location: ./new_namegenerator/new_namegenerator.php');
}

include('./includes/header.php');
include('./includes/nav.php');
 ?>


     <div class="container centertext boldfont">
        <div class="row hidden" id="toggleform">
          <div class="col-md-2">
          </div>
          <div class="col-md-8">
           <h1 class="display-4">Sign Up</h1>
            <form class="" method="post">
              <input type="email" class="indexform" name="email" placeholder="your email">
              <br>
              <input type="password" class="indexform" name="password" value="" placeholder="Password">
              <br>
              <label for="stayLoggedIn">Remeber me</label>
              <input type="checkbox" id="stayLoggedIn" name="stayLoggedIn" value="1">
              <input type="hidden" name="signup" value="1">
              <br>
              <input type="submit" name="submit" value="sign up!" class="alert alert-info">
            </form>
            <p class="toggle">Already a member? Click here to log in instead</p>
          </div>
          <div class="col-md-2">
          </div>
        </div>

        <div class="row" id="toggleform">
          <div class="col-md-2">

          </div>
          <div class="col-md-8">
           <h1 class="display-4">Log In</h1>
            <form class="" method="post">
              <input type="email" class="indexform" name="email" placeholder="your email">
              <br>
              <input type="password" class="indexform" name="password" value="" placeholder="Password">
              <br>
              <label for="stayLoggedIn">Remeber me</label>
              <input type="checkbox" id="stayLoggedIn" name="stayLoggedIn" value="1">
              <input type="hidden" name="signup" value="0">
              <br>
              <input type="submit" name="submit" value="login" class="alert alert-info">
            </form>
            <p class="toggle">Not yet a member? Click here to sign up instead</p>
          </div>

          <div class="col-md-2">
          </div>

        </div>

        <div class="row">
          <div class="col-md-4">
          </div>
          <div class="col-md-4">
            <div class="alert alert-danger errorcontainer hidden"><?php echo $error ?></div>
          </div>
          <div class="col-md-4">
          </div>
        </div>

     </div>

<?php
include('./includes/scripts.php');
 ?>
   <script type="text/javascript">
     $(".toggle").click(function() {
       $("div#toggleform").toggleClass("hidden");
     });
     if ($(".errorcontainer").html().length > 0) {
       $('.errorcontainer').toggleClass("hidden");
     }
   </script>
<?php
  include('./includes/footer.php');
?>
