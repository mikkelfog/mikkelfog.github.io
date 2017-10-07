//Submit function
$("#submitbutton").click(function(){
  var columns = $("#inputBox1").val();
  var table = $("#inputBox2").val();
  var condition1 = $("#inputBox3").val();
  var value1 = $("#inputBox4").val();
  var condition2 = $("#inputBox5").val();
  var value2 = $("#inputBox6").val();
  var parameters = [columns, table, condition1, value1, condition2, value2];
  console.log(parameters);
  $.ajax({
    type: "POST",
    url: "sandboxquery.php",
    data: { parametersArray : parameters },
    cache: false,
    success: function(html) {
      $("#resultholder").html(html);
    }
  });
});

//List of tables function
$("#availabletablesbutton").click(function(){
    $.ajax({
    type: "POST",
    url: "listofavailabletables.php",
    cache: false,
    success: function(html) {
      $("#tablesindatabase").html(html);
    }
  });
});

//toggle filter buttons
$("#togglefilter1button").click(function() {
  $("#filter1").toggleClass("hidden");
});
$("#togglefilter2button").click(function() {
  $("#filter2").toggleClass("hidden");
});
