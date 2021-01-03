<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
<link rel="stylesheet" href="css/style_website.css">
<title>Welcome to 秋</title>
<body>
  <div class="header">
    <div class="icons">
      <ul>
          <?php require 'includes/dbh.inc.php';
          session_start();
          if (!isset($_SESSION['id'])) { ?>
          <li ><a>登录</a></li>
          <?php } else if (isset($_SESSION['id'])) { ?>
          <li ><a href="includes/logout.inc.php">logout 退出</a></li>
          <?php } ?>
          <li ><a>🔥</a></li>
          <li ><a>🌊</a></li>
      </ul>
    </div>

  </div>
  <div class="container">
    <?php

    $id = $_SESSION['id'];
    $image = "";
    $stmt = $conn->prepare("SELECT * FROM users WHERE idUsers = ? LIMIT 1;");
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc()){
      echo "<div id='dropregion' >";
        if ($row['profile_image'] !== null) {
          echo "<img alt='profile_pic' class='profile_pic' src='upload/".$row['profile_image']."'>";
        } else {
          echo "<img alt='profile_pic' class='profile_pic' src='upload/def_a.jpg'>";
        }
      echo "<h1>".$row['uidUsers']."</h1>";
      echo "</div>";
   }

    ?>
    <!-- profile pic, with optional upload -->
    <form method="post" action="includes/upload.inc.php" enctype="multipart/form-data">
            <input type="file" name="file">
            <button id="upload_pic" type="submit" class="profile_pic_button" name="profile-submit">Upload</button>
    </form>

    <div class="content">
      <div class="e">
        <div id="upload" style="display: block;">
          <form class="upload" action="includes/create-post.php" method="post">
                <input type='text' class='aa' placeholder='...' name='post_title' value='<?php echo $row['post_title'];?>'</p>
                <div class="aW">
                  <textarea class="bb" name="post_content" placeholder="..."></textarea>
                  <input class="dd" type='text' name='postTags' placeholder='#..' value='<?php echo $row['postTags'];?>'</p>
                </div>
                <button class="cc" name="post_button" type="submit" value="post">post</button>
                <!-- ADD JAVASCRIPT TO CHECK FOR EMPTY INPUT -->
          </form>
        </div>
        <div class="posts">

          <?php
          //display user's posts
          $stmt = $conn->prepare("SELECT * FROM users WHERE idUsers = ? LIMIT 1;");
          $stmt->bind_param('s', $id);
          $stmt->execute();
          $result = $stmt->get_result();
          while($row = $result->fetch_assoc()){
            $user_id = $row['userid'];
            $stmt = $conn->prepare("SELECT * FROM posts WHERE user_id=? ORDER BY date desc;");
            $stmt->bind_param('s', $user_id);
            $stmt->execute();
            $result = $stmt->get_result();
            if(mysqli_num_rows($result)>0){
              while($row = $result->fetch_assoc()){
                echo "<p class='post_title'>".$row['post_title']."</p> <p class='post_date'>".date("d-M",strtotime($row['date']))."</p>";
                echo "<p class ='post_content'>".$row['post']."</p>";
                echo '<p>';
                  $links = array();
                  $parts = explode(',', $row['tags']);
                  foreach ($parts as $tag)
                  {
                      $links[] = "<a class='tag' href='t-".$tag."'>".$tag."</a>";
                  }
                  echo implode(", ", $links);
                echo '</p>';
              }
            } else {
              echo"<p class='persons_post'> no posts yet! <p>";
            }
          }
          ?>
      </div>
  </div>
  <!--
  <div id="drop-region">
  	<div class="drop-message">
  		Drag & Drop images or click to upload
  	</div>
  	<div id="image-preview"></div>
  </div>
  -->
  <footer class="footer">footer text</footer>
</body>
<script src="js/toggle_text.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
