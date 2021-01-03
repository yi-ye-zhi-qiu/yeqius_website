<?php
//Install composer:  https://getcomposer.org/download/
/**Install PHPMailer: https://github.com/PHPMailer/PHPMailer, or by opening terminal
and typing (on mac)
php composer.phar require phpmailer/phpmailer
**/
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once '/Users/user.me/vendor/autoload.php';

 //check for empty emailbox
 $email = $_POST['email'];
 if (empty($email)) {
   header("Location: ../reset-password.php?error=emptyuidpass&un=".$email);
   exit();
 }
 else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
   header("Location: ../reset-password.php?error=invalidmail&uid=".$email);
   exit();
 }

     if (isset($_POST["reset-request-submit"])) {

       //prevents timing attacks
       $selector = bin2hex(random_bytes(8));

       //needs to be slightly longer in order to be secure
       $token = random_bytes(32);
       $url = "http://localhost/yeqius_website/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token); //Change to website name

       $expires = date("U") + 600;

       require 'dbh.inc.php';

       $userEmail = $_POST["email"];

       $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?;";
       $stmt = mysqli_stmt_init($conn);
       if (!mysqli_stmt_prepare($stmt, $sql)) {
         echo "There's an error";
         exit();
       } else {
         mysqli_stmt_bind_param($stmt, "s", $userEmail); //what ? will be replaced with
         mysqli_stmt_execute($stmt);
       }

       $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?);";
       $stmt = mysqli_stmt_init($conn);
       if (!mysqli_stmt_prepare($stmt, $sql)) {
         echo "There's an error";
         exit();
       } else {
         $hashedToken = password_hash($token, PASSWORD_DEFAULT);
         mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
         mysqli_stmt_execute($stmt);
       }

       mysqli_stmt_close($stmt);
       mysqli_close();

        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->Mailer = "smtp";
        $mail->SMTPDebug  = 1;
        $mail->SMTPAuth   = TRUE;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
        $mail->Host       = "smtp.gmail.com";
        $mail->Username   = "";
        $mail->Password   = "";
        $mail->AddReplyTo('yeqiuswebsite@gmail.com', "yeqiu website team");
        // Instantiation and passing `true` enables exceptions
        $mail->isHTML(true);
        $mail->AddAddress($userEmail);
        $mail->SetFrom("yeqiueswebsite@gmail.com", "yeqiu website team");

        $mail->Subject = "Reset your password for yeqiu.com";
        $mail->Body = "

        <html>
          <head>
            <meta charset='utf-8'>
            <title></title>
          </head>
          <body style='background: #1111;overflow: hidden;font-family: 'Roboto',sans-serif, 微軟正黑體;display: block;direction: ltr;font-size: 14px;line-height: 1.4286;margin: 0;padding: 0;'>
            <div class='zx'>
              <div class='ab' style='height: 10px;margin: 0 auto;overflow: visible;position: relative;width: 75px;'>
                <img src='img/logo.png' alt='logo' class='logo' style='height: 100px;overflow: visible;position: relative;width: 75px;'>
              </div>
              <div class='zx1' style='padding-top: 80px;position: relative;'>
                <h1 style='text-align: center;font-family: 'Google Sans','Noto Sans Myanmar UI',arial,sans-serif;padding-bottom: 20px;'>Hello, </h1>
                <p style='text-align: center;font-family: 微軟正黑體, Roboto;font-size: inherit;'>  We received a password request to reset the qiu.com account for $userEmail.<br><br>您收到此封邮件的原因是我们收到了对于 $userEmail 重置密码的申请。</p>
                <button class='zx123' style='cursor: pointer;text-align: center;border-radius: 4px;font-size: .875rem;letter-spacing: .0892857143em;text-decoration: none;border: none;color: #444;display: block;font-weight: 500;min-width: 64px;outline: none;overflow: visible;position: relative;box-sizing: border-box;vertical-align: middle;white-space: normal;background: #FFB74D;padding: 0 8px 0 8px;font-family: 微軟正黑體 !important;text-transform: uppercase;margin: auto;line-height: inherit;height: 36px;'><a style='text-decoration: none;color: #111' href='$url'>Reset password / 重置密码</a>  </button>
              </div>
              <p style='text-align: center;font-family: 微軟正黑體, Roboto;font-size: inherit;'>Note: The link will expire in 10 minutes.</p>
              <p style='text-align: center;font-family: 微軟正黑體, Roboto;font-size: inherit;'>过了10分钟链接没用了.</p>
            </div>
            <footer class='footer' style='font-size: 11px;letter-spacing: .0107142857em;'>
              <p style='text-align: center;font-family: 微軟正黑體, Roboto;font-size: inherit;'>Not you? Please ignore this e-mail & your account will remain unaffected.<br>如果您没有申请，可以忽略这封邮件，你的账号不会受到影响。</p>
            </footer>
          </body>
      </html>
      ";

        if(!$mail->Send()) {
          echo "Error while sending Email. 碰到了错误。";
        } else {
          //echo '<script type="text/javascript">alert("An email has been sent！ (邮件已发送啦！) ' . $userEmail . '-- 请你检查哦！，please check here!")</script>';
          echo "<script> window.location.assign('../index.php?action=success&in=rs')  </script>";
          echo "密码重置链接已经发送";
        }

     } else {
       echo "<script>window.location.assign('../index.php')</script>";
     }


?>
