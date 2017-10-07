<?php
session_start();
include('../includes/connection.php');
include('../includes/header.php');
include('../includes/nav.php');
?>
  <p>Box 1</p>
  <input type="text" name="" value="" placeholder="selection" id="inputBox1">
  <p>Box 2</p>
  <input type="text" name="" value="" placeholder="selection" id="inputBox2">
  <p>Box 3</p>
  <input type="text" name="" value="" placeholder="selection" id="inputBox3">

  <?php
    include('../includes/scripts.php');
  ?>

  <script type="java/">
  //Submit function
  $("#submitbutton").click(function(){
    var val1 = $("#inputBox1").val();
    var val2 = $("#inputBox2").val();
    var val3 = $("#inputBox3").val();
    var parameters = [val1, val2, val3];
    console.log(parameters);
    $.ajax({
      type: "POST",
      url: "insertQuery.php",
      data: { parametersArray : parameters },
      cache: false,
      success: function(html) {
        $("#resultholder").html(html);
      }
    });
  });



  </script>

  <?php
    include('../includes/footer.php');
  ?>
