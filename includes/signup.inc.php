<?php
if (isset($_POST['signup-submit'])) {

  require 'dbh.inc.php';

  $username = $_POST['uid'];
  $email = $_POST['mail'];
  $password = $_POST['pwd'];

  //checking for empty fields, just in case button is enabled from developer console
  //and checking the field inputs as to prevent SQL  injection
  //even though we do this in JS for clarity, we should still do it in PHP just in case JS gets bypassed
  if (empty($username)){
    header("Location: ../signup.php?error=emptyuid".$username."&mail=".$email);
    exit();
  }
  else if (empty($email)){
    header("Location: ../signup.php?error=emptyemail");
    exit();
  }
  else if (empty($password)){
    header("Location: ../signup.php?error=emptypassword");
    exit();
  }
  else if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", $password)){
    header("Location: ../signup.php?error=invalidpassword");
  }

//we need to do these validations to prevent SQL injection
//this is just so that if someone enables button via developer console
//for most  users they will get a nicely displayed msg, but those ppl
//get just a bolded error code triggered by some php in our index.php lol
  else if (!preg_match("/^[a-zA-Z][a-zA-Z0-9_-]{3,15}$/", $username) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../signup.php?error=invaliduidmail");
    exit();
  }
  else if (!preg_match("/^[a-zA-Z][a-zA-Z0-9_-]{3,15}$/", $username)) {
    header("Location: ../signup.php?error=invaliduid&mail=".$email);
    exit();
  }
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../signup.php?error=invalidmail&uid=".$username);
    exit();
  }

  else {


    $sql = "SELECT uidUsers FROM users WHERE uidUsers=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../signup.php?error=sqlerror");
      exit();
    }  else {

      mysqli_stmt_bind_param($stmt, "s", $username);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultCount = mysqli_stmt_num_rows($stmt);
      mysqli_stmt_close($stmt);

      if ($resultCount > 0) {
        header("Location: ../signup.php?error=usertaken&un=".$username."&email=".$email);
        exit();
      }
      else {

        $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers, userid) VALUES (?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)){
          header("Location: ../signup.php?error=sqlerror?where=a");
          exit();
        }
        else {
          $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

          //create random integer for userid
          $length = rand(4,19);
          $number = "";
          for ($i=0; $i < $length; $i++){
            $new_rand = rand(0,9);
            $number = $number . $new_rand;
          }

          mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $hashedPwd, $number);
          mysqli_stmt_execute($stmt);
          header("Location: ../index.php?action=success&in=sn&person=".$username);
          exit();
        }
      }
    }
  }
  //even though these close automatically, just to be safe...
  mysqli_stmt_close($stmt);
  mysqli_stmt_close($stmt_pi);
  mysqli_close($conn);
}
else {
  // for invalid page url access redirect back to index.php
  header("Location: ../index.php");
  exit();
}
