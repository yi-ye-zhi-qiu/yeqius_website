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
    <title>Reset your qiu.com password</title>
    <style>
      <?php include "css/style.css" ?>
    </style>
 </head>



<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="js/jquery.js"></script>
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
            <img src="img/logo.png" alt="logo" class="logo">
          </div>
          <div class="xyrp1">
            <h1 data-mlr-text class="中文">重新密码</h1>
              <div class="xxx2">
                <div class="xxx3">
                 <div class="verify" id="addTo">
                  <div class="xxx4">
                    <?php
                        if (!isset($_SESSION['id'])) {
                    ?>
                              <form action="includes/reset-request.inc.php" method="post" id="login-form">
                                <section class="yy1">
                                <header class="yy2" aria-hidden="true"></header>
                                 <div class="xx2">
                                  <div class="xx3">
                                    <div class="xx4">
                                      <div class="xx5">
                                        <div class="xx6">
                                            <div class="xx6v1">
                                              <input type="text" name="email" aria-label="输入邮件 Enter e-mail" value autocapitalize="none" id="passwordbox" class="xx7" spellcheck="false" tabindex="0" initial-dir="ltr" dir="ltr">
                                              <div id="xx8" data-mlr-text class="xx8 中文" aria-hidden="true">输入邮件 Enter e-mail</div>
                                            </div>
                                          <div id="xx11" class="xx11 xxxx11"></div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="xxx8">
                                <span class="errors"></span>
                                </div>
                              </div>
                            </div>
                            <div class="zxx8 zxxxxx6" id="identifierNext">
                              <div class="dazcv zxxxxx6">
                                <div class="zx8 zxxxxx6" role="button" id="ow298">
                                  <button type="submit" data-mlr-text name="reset-request-submit" class="中文 zx5 zxxxxx6" id="submit">Get Reset Link / 获取验证码 </button>
                                </div>
                              </div>
                            </div>
                            <div class="xxx8">
                            <span class="errors" id="emptyuidpwd"></span>
                            </div>
                          </div>
                          <div class="zx6">
                           <div class="zx7">
                            <div class="zxx7">
                              <div class="zxcnv">
                                <div role="button" class="iqeoad" tabindex="0">
                                 <span jsslot class="wxcz">
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
              </div>
            </div>
          </div>
          <footer class="zz1"></footer>
     </div>
    </div>
  <div class="qq" aria-hidden="true"></div>
  </div>
</body>
<?php
} if ($_GET["error"] == "emptyemail") { ?>
      <script type="text/javascript">
        const input = document.querySelector(".xx7");
        input.focus();
        input.classList.add("shake");
        const xzx = document.querySelector("#casv");
        xzx.classList.add("xxAddBorder");
        const xyz = document.querySelector("#xx11")
        xyz.classList.remove("xxxx11");
      </script>

<?php
} else if (isset($_SESSION['id'])) {
 echo '
    <form action="includes/logout.inc.php" method="post">
        <button type="submit" name="logout-submit">退出</button>
    </form>';
}
