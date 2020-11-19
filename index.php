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
    <title>Login to 秋</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
 </head>

<body>
<script id="a1" src="js/onload.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
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
            <h1>登录</h1>
            <div class="xy2 vmnlimit" id="xy2">欢迎</div>
              <div class="xxx2">
                <div class="xxx3">
                  <div class="xxx4">
                    <?php
                        if (!isset($_SESSION['id'])) {
                            echo '<form action="includes/login.inc.php" method="post" id="login-form">
                                    <section class="yy1">
                                      <header class="yy2" aria-hidden="true"></header>
                                      <div class="xx2">
                                        <div class="xx3">
                                          <div class="xx4">
                                            <div class="xx5">
                                              <div class="xx6">
                                                <div class="xx6v1">
                                                  <input type="text" name="mailuid" aria-label="用户名" autocapitalize="none" id="casv" class="xx7" spellcheck="false" tabindex="0" initial-dir="ltr" dir="ltr">
                                                  <div id="xx8" class="xx8" aria-hidden="true">用户名</div>
                                                </div>
                                                <div id="xx11" class="xx11 xxxx11" ></div>
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
                                                <span id="togglePassword" class="fa fa-eye fa-2x"></span>
                                                <div id="xx8v2" class="xx8" aria-hidden="true">密码</div>
                                              </div>
                                              <div class="xx11 xxxx11" id="qwe" >
                                              </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                <span class="tyu123"></span>
                              </div>
                                <div class="zx6">
                                  <div class="zx7">
                                   <div class="zxx7">
                                    <div class="zxx8" id="identifierNext">
                                     <div class="dazcv">
                                        <div class="zx8" role="button" id="ow298">
                                            <button type="submit" name="login-submit" class="zx5" id="submit" >Go / 登录</button>
                                        </div>
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
                    <footer class="RwBngc">
                      <div class="u7land">
                        <div class="TkU0Xc" role="listbox" aria-expanded="false" id="lang-chooser"
                          <div class="zz1v3" role="presentation">
                            <div class="zz1v4" aria-selected="true" tabindex="0" role="option">
                              <div class="zz1v5" style="top: 6.80896px; left: 77.2118px; width: 88px; height: 88px;"></div>
                              <span class="zz1v6">&#8234;简体中文&#8234;</div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </footer>
                  </div>
                </div>
              </div>
            </div>
          </div>

     </div>
    </div>
  <div class="qq" aria-hidden="true"></div>
  </div>
</body>';}
else if (isset($_SESSION['id'])) {
 echo '
    <form action="includes/logout.inc.php" method="post">
        <button type="submit" name="logout-submit">退出</button>
    </form>';
}
// Here we create a success message if the new user was created.
if (isset($_GET["signup"])) {
  if ($_GET["signup"] == "success") {
    echo '
    <script type="text/javascript">',
    'document.getElementById("xy2").innerHTML="ok pls login";',
    'document.getElementById("xy2").classList.remove("vmnlimit");',
    'document.getElementById("xy2").classList.add("vmn");',
    '</script>';
  }
}
?>
<?php
  if (isset($_GET["error"])){
    if ($_GET["error"] == "emptyuidpass"){ ?>
      <script type="text/javascript">
        const input = document.querySelector(".xx7");
        input.focus();
        input.classList.add("shake");
        const xzx = document.querySelector("#casv");
        xzx.classList.add("xxAddBorder");
        const xyz = document.querySelector("#xx11")
        xyz.classList.remove("xxxx11");
      </script>
<?php  }
  if ($_GET["error"] == "emptypass"){
    $un = $_GET["un"];
?>
    <script type="text/javascript">
      const input = document.getElementById("pass");
      input.focus();
      input.classList.add("shake");
      const xt = document.querySelector("#qwe");
      xt.classList.add("xxAddBorder");
      xt.classList.remove("xxxx11");
      const AT = document.querySelector(".xx8").classList.add("xxMoveText");
      document.querySelector(".xx7").value = '<?php echo $un; ?>';
    </script>
<?php }
  if ($_GET["error"] == "wronguidpwd"){
?>
  <script type="text/javascript">
    const input = document.querySelector(".xx7");
    input.focus();
    input.classList.add("shake");
    const xzx = document.querySelector("#casv");
    xzx.classList.add("xxAddBorder");
    const xyz = document.querySelector("#xx11")
    xyz.classList.remove("xxxx11");
    document.querySelector(".tyu123").innerHTML="<a id=rp href=reset-password.php>Forgot password? 重置密码</a>"
  </script>
<?php
} }
?>
</html>
