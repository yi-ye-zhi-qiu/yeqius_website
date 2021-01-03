<?php

  if (isset($_POST["create-password-submit"])) {

    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $password = $_POST["pwd"];

    if (empty($password)) {
      header("Location: ../create-new-password.php?error=emptypass&selector=".$selector."&validator=".$validator);
    }
    if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", $password)){
      header("Location: ../create-new-password.php?error=invalidpassword&selector=".$selector."&validator=".$validator);
    }
    $currentDate = date("U");

    require 'dbh.inc.php';

    $sql = "SELECT * FROM pwdReset WHERE pwdResetSelector=? AND pwdResetExpires >= ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      echo "There's an error";
      exit();
    } else {
      mysqli_stmt_bind_param($stmt, "ss", $selector, $currentDate); // want to check selector matches
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if(!$row = mysqli_fetch_assoc($result)) { //if no rows returned
          echo "Please re-submit your reset request. 请你再试一次. Error: unmatched selector";
          exit();
      }
      else {

        //convert validator into binary
        $tokenBin = hex2bin($validator);
        $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);

        if ($tokenCheck === false) {
          echo "Please re-submit your reset request. 请你再试一次. Error: unmatched token.";
          exit();
        } elseif ($tokenCheck === true) { //use elseif just incase $token is equal to smth crazy

          $tokenEmail = $row['pwdResetEmail'];

          $sql = "SELECT * FROM users WHERE emailUsers=?;";

          $stmt = mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "There's an error";
            exit();
          } else {
            mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if(!$row = mysqli_fetch_assoc($result)) { //if no rows returned
                echo "There was an error. Please re-submit your reset request. 请你再试一次. Error: email not found (user DNE).";
                exit();
            } else {

              $sql = "UPDATE users SET pwdUsers=? WHERE emailUsers=?";

              $stmt = mysqli_stmt_init($conn);
              if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "There's an error. Error: unable to update pwd.";
                exit();
              } else {
                $newPwdHash = password_hash($password, PASSWORD_DEFAULT);
                mysqli_stmt_bind_param($stmt, "ss", $newPwdHash, $tokenEmail);
                mysqli_stmt_execute($stmt);

                $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?;";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                  echo "There's an error. Error: cannot delete token.";
                  exit();
                } else {
                  mysqli_stmt_bind_param($stmt, "s", $userEmail); //what ? will be replaced with
                  mysqli_stmt_execute($stmt);
                  header("Location: ../index.php?action=success&in=np&person=".$tokenEmail);
                }

              }
            }
          }
        }
      }
    }
  } else {
    header("Location: ../index.php");
  }
 ?>
