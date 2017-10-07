//VARIABLES
var current_name;
var current_number;
var all_text;
var allnames;
var favoritenames = [];
var remainingnames;

$( document ).ready(function() {
    console.log( "ready!" );

    $.getJSON( "/name_files/names.json", function( data ) {
      allnames = data;
      console.log(allnames.length);

      remainingnames = allnames;

      console.log(remainingnames);

      var remainingnamesHTML = [];
      $.each(remainingnames, function(index, item) {
          remainingnamesHTML.push('<p>' + item.number + " " + item.name + '</p>');
      });
      $(".remainingnameslist").html(remainingnamesHTML.join(""));

    });

// FUNCTIONS
    function generateNewName() {
      current_number = Math.floor(Math.random()*remainingnames.length);
      current_name = remainingnames[current_number].name;
      all_text = current_name+ " " + $(".last_name").val();
      $(".name_holder").html(all_text);
    }

    function removeNameFromRemaining() {
        remainingnames.splice(current_number, 1);
    }

    function pushNameToFavoriteList() {
      console.log("pushFunction Started");
      $.ajax({
        type: "POST",
        url: "updateDatabase.php",
        data: {content: current_name}
      })
        .done(function(data) {
          console.log("success! - " + current_name + " is pushed to the favorites");
      });
    }

    function buttonVisibility() {
      $(".start").addClass("hidden");
      $(".save").removeClass("hidden");
      $(".dismiss").removeClass("hidden");
    }

// Start Button
    $(".start").click(function(e){
      generateNewName();
      buttonVisibility();
    })
// Dismiss Button
      $(".dismiss").click(function() {
        generateNewName();
        removeNameFromRemaining();
      });
// Save Button
      $(".save").click(function() {
        pushNameToFavoriteList();
        generateNewName();
        removeNameFromRemaining();
        // updateFavoriteNameList();
      });

});
