
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
    <link rel="stylesheet" href="style.css">
 </head>

<body>
<script src="app.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="jquery.js"></script>
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
            <h1>Join Qiū</h1>
              <div class="xxx2">
                <div class="xxx3">
                  <div class="xxx4">
                    <?php
                        if (!isset($_SESSION['id'])) {
                            echo '<form action="includes/signup.inc.php" method="post" id="login-form">
                                    <section class="yy1">
                                      <header class="yy2" aria-hidden="true"></header>
                                      <div class="xx2">
                                        <div class="xx3">
                                          <div class="xx4">
                                            <div class="xx5">
                                              <div class="xx6">
                                                <div class="xx6v1">';
                                                if (!empty($_GET["uid"])) {
                                                  echo '<input type="text" name="uid" aria-label="用户名" value autocapitalize="none" id="casv" class="xx7" spellcheck="false" tabindex="0" initial-dir="ltr" dir="ltr" value="'.$_GET["uid"].'" id="casv">';
                                                }
                                                else {
                                                  echo '<input type="text" name="uid" aria-label="用户名" value autocapitalize="none" id="casv" class="xx7" spellcheck="false" tabindex="0" initial-dir="ltr" dir="ltr" id="casv">';
                                                }
                                                echo
                                                  '
                                                  <div id="xx8" class="xx8" aria-hidden="true">Username / 用户名</div>
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
                                              <div class="xx6v1">';
                                              if (!empty($_GET["mail"])) {
                                                echo '<input type="text" name="mail" aria-label="e-mail" value autocapitalize="none"  class="xx7" spellcheck="false" tabindex="0" initial-dir="ltr" dir="ltr" value="'.$_GET["mail"].'" id="casvz">';
                                              }
                                              else {
                                                echo '<input type="text" name="mail" aria-label="e-mail" value autocapitalize="none"  class="xx7" spellcheck="false" tabindex="0" initial-dir="ltr" dir="ltr" id="casvz">';
                                              }
                                              echo
                                                '
                                                <div id="xx8v3" class="xx8" aria-hidden="true">e-mail / 邮件</div>
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
                                                <input type="password" name="pwd" id="pass" spellcheck="false" tabindex="0" aria-label="密码" dir="ltr" autocapitalize="off" class="xx7">
                                                <div id="xx8v2" class="xx8" aria-hidden="true">Password / 密码</div>
                                              </div>
                                              <div class="xx11 xxxx11" id="qwe"></div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                  <div class="xxx8">
                                    <span class="errors" id="emptyfields"></span>
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
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
          <footer class="zz1"></footer>
     </div>
    </div>
  <div class="qq" aria-hidden="true"></div>
  </div>
</body>';}

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
                    'document.getElementById("emptyfields").innerHTML="输入 enter valid 正确的用户名"',
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

          ?>