//VARIABLES
var current_name;
var current_number;
var all_text;
var allnames;
var favoritenames = [];
var remainingnames;

$(document).ready(function() {
//find number of names in database
  console.log("numberofnames is running");
  $.ajax({
    type: "POST",
    url: "queryNumberofrows.php",
    cache: false,
    success: function(data){
      console.log("here's what we got from the query: "+data);
      $("#mainnumberholder").html(data);
    }
  });
  console.log("numberofnames is done");
  });

// FUNCTIONS

//generateNewName
function generateNewName(){
  current_number = Math.floor(Math.random()*$("#mainnumberholder").html());
  console.log(current_number);
  $("#currentnumberholder").html(current_number);
  var parameters = [current_number];
  var last_name = $(".last_name").val();
  $.ajax({
    type: "POST",
    url: "queryDatabase.php",
    data: { parametersArray : parameters},
    cache: false,
    success: function(html) {
      $("#name_holder").html(html + " " + last_name);
    }
  });
};

    function pushNameToFavoriteList() {
      console.log("pushFunction Started");
      console.log(current_number);
      $.ajax({
        type: "POST",
        url: "new_updateDatabase.php",
        data: {content: current_number}
      })
        .done(function(data) {
          console.log(data);
      });
    }

    function buttonVisibility() {
      $(".start").addClass("hidden");
      $(".save").removeClass("hidden");
      $(".dismiss").removeClass("hidden");
    }

// Start Button
    $(".start").click(function(){
      console.log('start button clicked');
      generateNewName();
      buttonVisibility();
    })
// Dismiss Button
      $(".dismiss").click(function() {
        generateNewName();
      });
// Save Button
      $(".save").click(function() {
        pushNameToFavoriteList();
        generateNewName();
      });
