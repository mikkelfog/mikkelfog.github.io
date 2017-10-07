<?php
    include('connection.php');
    if (array_key_exists('id', $_SESSION)) {
      include('navbar_Loggedin.php');
    } else {
      include('navbar_notLoggedin.php');
    }
  ?>
