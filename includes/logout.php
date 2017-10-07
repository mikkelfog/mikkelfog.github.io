<?php

session_start();
$_SESSION = array();
session_destroy();
setcookie('id', "", time()-60*60);
$_COOKIE['id'] = "";
header('Location: ../index.php');

 ?>
