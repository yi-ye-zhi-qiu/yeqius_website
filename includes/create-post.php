<?php
session_start();
require 'dbh.inc.php';
$id = $_SESSION['id'];
if(isset($_POST['post_button'])){
  $post_content = $_POST['post_content'];
  $post_tags = $_POST['postTags'];
  $post_title = $_POST['post_title'];
  if(!empty($post_content)){
    $users = "SELECT * FROM users";
    $r = mysqli_query($conn, $users);
    if (mysqli_num_rows($r) > 0) {
      //finally using OOP PHP for fucking christ's sake!
      $stmt = $conn->prepare("SELECT * FROM users WHERE idUsers= ? LIMIT 1;");
      $stmt->bind_param('s', $id);
      $stmt->execute();
      $result = $stmt->get_result();
      while($row = $result->fetch_assoc()){
        $user_id = $row['userid'];
        $sql = "INSERT INTO posts (post_id, user_id, post, post_title, tags) VALUES (?, ?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
          header("Location: ../home.php?error=sqlerror&error=postupload");
          exit();
        } else {
          $length = rand(4,19);
          $post_id = "";
          for ($i=0; $i < $length; $i++){
            $new_rand = rand(0,9);
            $post_id = $post_id . $new_rand;
          }
          //aaand back to procedural php :)
          mysqli_stmt_bind_param($stmt, "sssss", $post_id, $user_id, $post_content, $post_title, $post_tags);
          mysqli_stmt_execute($stmt);
          header("Location: ../home.php?upload=success");
          exit();
        }
      }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
  } else {
    echo "<b>please type somethin' to post!</b>";
  }
}
