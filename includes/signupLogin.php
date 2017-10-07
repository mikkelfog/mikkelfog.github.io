<?php
$error = "";

if (array_key_exists('submit', $_POST)) {

  if (!$_POST['email']) {
    $error .= "<br>An email address is required";
  }

  if (!$_POST['password']) {
    $error = $error."<br>A password address is required<br>";
  }

    if ($error != "") {
      $error = "There were error(s) in your form:".$error;
    } else {

      if ($_POST['signup'] == 1) {

      $query = "SELECT email from users where email ='".mysqli_real_escape_string($con, $_POST['email'])."' LIMIT 1";
      $result = mysqli_query($con, $query);
      if (mysqli_num_rows($result) > 0) {
        $error = "that email has already been taken";
      } else {
        $insertQuery = "INSERT INTO users (email, password)
        VALUES
        (
          '".mysqli_real_escape_string($con, $_POST['email'])."',
          '".mysqli_real_escape_string($con, $_POST['password'])."'
          )";
            if (!mysqli_query($con, $insertQuery)) {
              $error = "<p>Could not sign you up right now. Please try again later</p>";
            } else {

              // Set $id = the id of the last inserted row in the database, so it can be used multiple times
              $id = mysqli_insert_id($con);

              //set the session ID = $id variable, so we can keep track of the user being logged in.
              $_SESSION['id'] = $id;

              //update the password with a hashed version of the id, so it's more secure.
              $updatePasswordQuery = "UPDATE users SET password = '".md5(md5($id).$_POST['password'])."' WHERE id = ".$id." LIMIT 1";
              mysqli_query($con, $updatePasswordQuery);

              //set a cookie = $id, so the user can stay logged in across multiple sessions.
              if (array_key_exists('stayLoggedIn', $_POST)) {
                setcookie('id', $id, time()+60*60*24);
                print_r($_COOKIE);
              }

              //redirect to the namegenerator page
              header("Location: namegenerator.php");
          }
        }
      } else {
            $query = "SELECT email from users where email ='".mysqli_real_escape_string($con, $_POST['email'])."' LIMIT 1";
            $result = mysqli_query($con, $query);
            if (mysqli_num_rows($result) < 1) {
              $error = "We don't recognise that email";
            } else {
              $query = "SELECT * from users where email ='".mysqli_real_escape_string($con, $_POST['email'])."' LIMIT 1";
              $result = mysqli_query($con, $query);
              $row = mysqli_fetch_array($result);

              $hashedPassword = md5(md5($row['ID']).$_POST['password']);

              if ($row['password'] != $hashedPassword) {
                $error = "Wrong password dude";
              } else {
                $_SESSION['id'] = $row['ID'];
                if (array_key_exists('stayLoggedIn', $_POST)) {
                  setcookie('id', $row['ID'], time()+60*60*24);
                }
                header ('location: new_namegenerator.php');
              }

            }

          }

        }

      }

 ?>
