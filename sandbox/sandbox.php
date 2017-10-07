<?php
session_start();
include('../includes/connection.php');
include('../includes/header.php');
include('../includes/nav.php');
?>

 <div class="boldfont">

  <p>What table do you want to select from?</p>
    <input type="text" name="" value="" placeholder="table" id="inputBox2">
  <button type="button" name="button" class="btn btn-info" id="availabletablesbutton">list of tables</button>
    <ul id="tablesindatabase" class="hidden">
    </ul>

  <p>What columns do you want to select?</p>
  <input type="text" name="" value="" placeholder="selection" id="inputBox1">
  <br>
  <button type="button" name="button" class="btn btn-success" id="togglefilter1button">Add filter</button>

  <div class="hidden" id="filter1">
    <p>What do you want to filter based on?</p>
    <input type="text" name="" value="" placeholder="condition 1" id="inputBox3">
    <p>What's the specific thing you're looking for?</p>
    <input type="text" name="" value="" placeholder="value 1" id="inputBox4">
    <br>
    <button type="button" name="button" class="btn btn-success" id="togglefilter2button">Add a second filter</button>
    <div class="hidden" id="filter2">
      <p>What do you want to filter based on?</p>
      <input type="text" name="" value="" placeholder="condition 2" id="inputBox5">
      <p>What's the specific thing you're looking for?</p>
      <input type="text" name="" value="" placeholder="value 2" id="inputBox6">
      <br>
    </div>
  </div>

  <input type="submit" id="submitbutton" class="btn btn-info" name="" value="GO">
  <br>
  <div class="" id="resultholder">
  </div>
</div>

<?php
  include('../includes/scripts.php');
?>

<script src="sandbox_app.js"></script>

<?php
  include('../includes/footer.php');
?>
