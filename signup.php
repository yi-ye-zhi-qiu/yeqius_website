
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
    <title>Join 秋</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
 </head>

<body>
 <div class="xx">
   <div class="xy">
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
      <div class="xx1">
        <div class="xxx2">
          <div class="ab">
            <img src="img/logo.png" alt="logo" class="logo">
          </div>
          <div class="xy1">
            <h1 class="中文" data-mlr-text>注册</h1>
              <div class="xxx2">
                <div class="xxx3">
                  <div class="xxx4">
                    <?php
                        if (!isset($_SESSION['id'])) { ?>
                            <form action="includes/signup.inc.php" method="post" id="login-form">
                                    <section class="yy1">
                                      <header class="yy2" aria-hidden="true">
                                        <?php if (isset($_GET["error"])){
                                          $er = $_GET["error"];
                                          if($er === 'usertaken'){
                                            echo '<b>'.$_GET['un'].'</b> is already taken 请您选择其他的用户名';
                                          } else {
                                          echo '<b> Error: </b>'.$er.'<br>';
                                          }
                                        }?>
                                      </header>
                                      <div class="xx2">
                                        <div class="xx3">
                                          <div class="xx4">
                                            <div class="xx5">
                                              <div class="xx6">
                                                <div class="xx6v1">
                                                <?php
                                                if (!empty($_GET["uid"])) {
                                                  echo '<input type="text" name="uid" aria-label="用户名" value autocapitalize="none" id="loginbox" class="xx7" spellcheck="false" tabindex="0" initial-dir="ltr" dir="ltr" value="'.$_GET["uid"].'">';
                                                }
                                                else {
                                                  echo '<input type="text" name="uid" aria-label="用户名" value autocapitalize="none" id="loginbox" class="xx7" spellcheck="false" tabindex="0" initial-dir="ltr" dir="ltr">';
                                                }
                                                ?>
                                                <div id="xx8" data-mlr-text class="xx8 中文" aria-hidden="true">用户名</div>
                                                </div>
                                                <div id="xx11" class="xx11 xxxx11"></div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="xx3">
                                         <div class="xx4">
                                          <div class="xx5">
                                            <div class="xx6">
                                              <div class="xx6v1">
                                              <?php
                                              if (!empty($_GET["mail"])) {
                                                echo '<input type="text" name="mail" aria-label="e-mail" value autocapitalize="none"  class="xx7" spellcheck="false" tabindex="0" initial-dir="ltr" dir="ltr" value="'.$_GET["mail"].'">';
                                              }
                                              else {
                                                echo '<input type="text" name="mail" aria-label="e-mail" value autocapitalize="none"  class="xx7" spellcheck="false" tabindex="0" initial-dir="ltr" dir="ltr">';
                                              }
                                              ?>
                                              <div id="xx8v3" data-mlr-text class="xx8 中文" aria-hidden="true">邮件</div>
                                              </div>
                                              <div class="xx11 xxxx11" id="ztyu"></div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="xx3">
                                         <div class="xx4">
                                          <div class="xx5">
                                            <div class="xx6">
                                              <div class="xx6v1">
                                                <input type="password" name="pwd" id="passwordbox" spellcheck="false" tabindex="0" aria-label="密码" dir="ltr" autocapitalize="off" class="xx7">
                                                <span id="togglePassword" class="fa fa-eye fa-eye-slash fa-2x"></span>
                                                <div id="xx8v2" data-mlr-text class="xx8 中文" aria-hidden="true">密码</div>
                                              </div>
                                              <div class="xx11 xxxx11" id="qwe"></div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                       <div class="zx6">
                                        <div class="zx7">
                                         <div class="zxx7">
                                           <div class="zxx8" id="identifierNext">
                                             <div class="dazcv">
                                               <div class="zx8" role="button" id="ow298">
                                                 <button type="submit" name="signup-submit" class="zx5" id="submit">JOIN / 注册</button>
                                               </div>
                                             </div>
                                           </div>
                                           <div class="zxcnv">
                                            <div role="button" class="iqeoad" tabindex="0">
                                              <span jsslot class="wxcz">
                                                <span class="qsald">
                                                     <a class="qsald" href="index.php">Back</a>
                                                   </span>
                                                 </span>
                                               </div>
                                              </div>
                                            </div>
                                          </div>
                                         </section>
                                        </form>
                                      </div>
                                    <select  class="select" id="lang-chooser"><span class="focus"></span></select>
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


        /*  //Have to do these checks just in case button is enabled using developer console.
          if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyuid") {
              echo        '<script type="text/javascript">',
                          'document.getElementById("emptyfields").innerHTML="输入 enter 用户名"',
                           '</script>';
            }
            if ($_GET["error"] == "emptyemail") {
              echo        '<script type="text/javascript">',
                          'document.getElementById("emptyfields").innerHTML="输入 enter 邮件"',
                           '</script>';
            }
            if ($_GET["error"] == "emptypassword") {
              echo        '<script type="text/javascript">',
                          'document.getElementById("emptyfields").innerHTML="输入 enter 密码"',
                           '</script>';
            }

            else if ($_GET["error"] == "invaliduidmail") {
              echo  '<script type="text/javascript">',
                    'document.getElementById("emptyfields").innerHTML="输入 enter 正缺的邮件valid email"',
                    '</script>';
            }
            else if ($_GET["error"] == "invaliduid") {
              echo  '<script type="text/javascript">',
                    'document.getElementById("emptyfields").innerHTML="输入 enter valid username 正确的用户名"',
                    '</script>';
            }
            else if ($_GET["error"] == "invalidmail") {
              echo  '<script type="text/javascript">',
                    'document.getElementById("emptyfields").innerHTML="输入 enter 正缺的邮件valid email"',
                    '</script>';
            }
            else if ($_GET["error"] == "usertaken") {
              echo  '<script type="text/javascript">',
                    'document.getElementById("emptyfields").innerHTML="用户名 taken（已经有了）, pls 输入 enter another 用户名"',
                    '</script>';
            }
          }
          */
          ?>
          <script src="js/input_handler.js"></script>
          <script src="js/toggle_password.js"></script>
          <script src="js/lang_chooser.js"></script>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
          <script src="js/input_delay.js"></script>
