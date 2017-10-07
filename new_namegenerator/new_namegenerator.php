<?php
  session_start();
  include('../includes/connection.php');
  include('../includes/header.php');
  include('../includes/nav.php');
 ?>
    <div class="container text-center">
      <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8 centertext">
          <h1 class="display-1">Bebonomo</h1>
          <h4>inspiration for your baby's name</h4>
          <input type="text" name="efternavn" value="" placeholder="dit efternavn" class="last_name boldfont">
          <br>
          <input type="submit" name="" value="start" class="btn alert-info start my-1 boldfont">
          <div class="name_holder bigfont boldfont" id="name_holder">
          </div>
          <input type="submit" name="" value="Afvis" class="dismiss btn alert-danger hidden my-1 boldfont">
          <input type="submit" name="" value="Gem" class="save btn alert-success hidden my-1 boldfont">
          <p class="bigfont">
            You'll be able to see a list of your saved names in your <a href="/favoritelist/favoriteList.php">Favorite List</a>.
          </p>
          <div class="" id="mainnumberholder">
          <div class="" id="currentnumberholder">

          </div>
        </div>
        <div class="col-md-2">
        </div>
      </div>
    </div>

</div>
<?php include('../includes/scripts.php'); ?>
<script src="app.js"></script>
<?php include('../includes/footer.php'); ?>
