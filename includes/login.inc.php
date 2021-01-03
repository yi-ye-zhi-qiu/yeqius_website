<?php
if (isset($_POST['login-submit'])) {

  require 'dbh.inc.php';

  $mailuid = $_POST['mailuid'];
  $password = $_POST['pwd'];

  //check empty inputs -- since w ehave javascript to enable/disable buttons,
  //it's unlikely any users will get to this point,
  //but if you were to go into developer console and enable the button,
  //you need PHP code to redirect just in case anyone tries to do that.
  //you don't want to leave a vulnerability to the database connection.
  if(empty($mailuid) && empty($password)) {
    header("Location: ../index.php?error=emptyuidpass&un=".$mailuid);
    exit();
  }
  if (empty($mailuid)) {
    header("Location: ../index.php?error=emptyuidpass&un=".$mailuid);
    exit();
  }
  if (empty($password)) {
    header("Location: ../index.php?error=emptypass&un=".$mailuid);
    exit();
  }
  else {
    $sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../index.php?error=sqlerror");
      exit();
    }
    else {
      // If there is no error then we continue the script!
      mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if ($row = mysqli_fetch_assoc($result)) {
        $pwdCheck = password_verify($password, $row['pwdUsers']);
        if ($pwdCheck == false) {
          header("Location: ../index.php?error=wronguidpwd&un=".$mailuid);
          exit();
        }
        else if ($pwdCheck == true) {
          session_start();
          $_SESSION['id'] = $row['idUsers'];
          $_SESSION['uid'] = $row['uidUsers'];
          $_SESSION['email'] = $row['emailUsers'];
          // Now the user is registered as logged in and we can now take them anywhere
          header("Location: ../home.php?login=success");
          exit();
        }
      }
      else {
        header("Location: ../index.php?error=wronguidpwd&un=".$mailuid);
        exit();
      }
    }
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else {
  //invalid page url access redirects immediately
  header("Location: ../index.php");
  exit();
}
