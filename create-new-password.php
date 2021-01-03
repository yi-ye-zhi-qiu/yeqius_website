<?php
     session_start();
     require "includes/dbh.inc.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="description" content="Ye Qiu Liam Nathan Isaacs">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title>Create a new 秋 pwd 重置密码</title>
    <style>
      <?php include "css/style.css" ?>
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
 </head>
<body>

   <?php
   if (!isset($_SESSION['id'])) {

      $selector = $_GET["selector"];
      $validator = $_GET["validator"];

      //check that tokens are present
      if (empty($selector) || empty($validator)) {
        echo "Something went wrong when trying to reset your password. Please try again. 重置密码之中碰到了错误，请你再来一次试一下吧";
      } else {
        //check if hexidecimal tokens ARE hexidecimal
        if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
          ?>
        <div class="xx">
         <div class="xyrp">
          <div class="vcmvz" aria-hidden="true">
           <div class="ghgtu" role="progressbar">
            <div class="kiasd"></div>
             <div class="yuuyx"></div>
             <div class="yuri">
              <span class="I3ed"></span>
             </div>
             <div class="QeRzxYT">
              <span class="I4ed"></span>
             </div>
           </div>
          </div>
          <div class="xxrp1">
           <div class="xxx2">
            <div class="ab">
                   <!--<img src="img/logo.png" alt="logo" class="logo">-->
            </div>
            <div class="xyrp1">
             <h1 data-mlr-text class="中文">重置密码</h1>
             <div class="xxx2">
              <div class="xxx3">
               <div class="xxx4">
                <form action="includes/create-password.inc.php" method="post" id="login-form">
                  <input type="hidden" name="selector" value="<?php echo $selector;?>">
                  <input type="hidden" name="validator" value="<?php echo $validator;?>">
                  <section class="yy1">
                    <header class="yy2" aria-hidden="true"></header>
                    <div class="xx2">
                      <div class="xx3">
                        <div class="xx4">
                          <div class="xx5">
                            <div class="xx6">
                              <div class="xx6v1">
                                <input type="password" id="passwordbox" name="pwd" spellcheck="false" tabindex="0" aria-label="新的密码 New password" dir="ltr" autocapitalize="off" class="xx7">
                                <span id="togglePassword" class="fa fa-eye fa-eye-slash fa-2x"></span>
                                <div data-mlr-text class="xx8 中文" id="xx8v2" aria-hidden="true">新的密码 New password</div>
                              </div>
                              <div id="qwe" class="xx11 xxxx11"></div>
                             </div>
                            </div>
                           </div>
                          </div>
                         </div>
                        </div>
                       <div class="zxx8 zxxxxx6">
                        <div class="dazcv zxxxxx6">
                          <div class="zx8 zxxxxx6" role="button">
                            <button type="submit" name="create-password-submit" class="zx5 zxxxxx6" id="submit">Reset password / 重置密码 </button>
                          </div>
                         </div>
                       </div>
                      <div class="zx6">
                        <div class="zx7">
                          <div class="zxx7">
                            <div class="zxcnv">
                              <div role="button" class="iqeoad" tabindex="0">
                                <span class="wxcz">
                                  <span class="qsald">
                                    <a id="qsald" class="qsald" href="index.php">Back</a>
                                  </span>
                                </span>
                              </div>
                            </div>
                            <div class="zxcnv">
                              <div role="button" class="iqeoad" tabindex="0">
                                <span jsslot class="wxcz">
                                  <span class="qsald">
                                    <a id="qsald" class="qsald" href="signup.php">Sign-up / 注册</a>
                                  </span>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </section>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="zz1"></footer>
    <div class="qq" aria-hidden="true"></div>
  </body>
  <?php
          }
        }
      }
   ?>
    <script src="js/input_handler.js"></script>
    <script src="js/toggle_password.js"></script>
    <script src="js/lang_chooser.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/input_delay.js"></script>
</html>
