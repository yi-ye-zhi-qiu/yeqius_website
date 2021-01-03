<?php
  session_start();
  require 'dbh.inc.php';
  $id = $_SESSION['id'];

  if (isset($_POST['profile-submit'])) {
      $file_name = $_FILES['file']['name'];
      $fileExt = explode('.', $file_name);
      $file_ext = strtolower(end($fileExt));
      $valid_extensions = array('jpg', 'jpeg', 'png');
      $stmt = $conn->prepare("SELECT * FROM users WHERE idUsers = ? LIMIT 1;");
      $stmt->bind_param('s', $id);
      $stmt->execute();
      $result = $stmt->get_result();
      while($row = $result->fetch_assoc()){
        $userid = $row['userid'];
        if (in_array($file_ext, $valid_extensions)){
          if ($_FILES['file']['error'] === 0){
            if ($_FILES['file']['size'] < 1000000) {
              $file_new_name = "profile" . $userid . "." . $file_ext;
              $file_destination = '../upload/' . $file_new_name;
              move_uploaded_file($_FILES['file']['tmp_name'], "../upload/" . $file_new_name);
              $sql = "UPDATE users SET profile_image='$file_new_name' WHERE idUsers='$id' LIMIT 1;";
              $result = mysqli_query($conn, $sql);
              header("Location: ../home.php?uploadsuccess");
              die;
            } else {
              echo "Please select img less than 1GB";
            }
          } else {
            echo "Error in upload, please try again";
          }
        } else {
          echo "Please select jpg, jpeg, or png files";
        }
      }
}
