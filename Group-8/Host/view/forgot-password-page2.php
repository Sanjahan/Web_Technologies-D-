<?php
require_once('../model/forgot-password-model.php');
session_start();
if(!isset($_SESSION['mail'])) header('location:forgot-password.php?err=accessDenied');
$row = getUserByMail($_SESSION['mail']);
$securityQuestion = $row['SecurityQuestion'];
$error_msg = '';

if (isset($_GET['err'])) {

  $err_msg = $_GET['err'];
  
  switch ($err_msg) {
    case 'empty': {
        $error_msg = "Enter an answer first.";
        break;
      }
    case 'answerError': {
        $error_msg = "Incorrect answer please try again.";
        break;
      }
    case 'invalid': {
        $error_msg = "Password is invalid.";
        break;
      }
    case 'mismatch': {
        $error_msg = "Passwords do not match.";
        break;
      }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <script>
      function isValidForgotPassword2(form) {

        let answer = form.answer.value;
        let password = form.password.value;
        let cpassword = form.cpassword.value;
        let flag = true;

        document.getElementById("answerError").innerHTML = "";
        document.getElementById("passwordError").innerHTML = "";
        document.getElementById("cpasswordError").innerHTML = "";

        if (answer === "") {
            document.getElementById("answerError").innerHTML = "Please enter the security question answer.<br>";
            flag = false;
        }

        if (password === "") {
            document.getElementById("passwordError").innerHTML = "Please enter a new password.<br>";
            flag = false;
        }

        if (cpassword === "") {
            document.getElementById("cpasswordError").innerHTML = "Please confirm your password.<br>";
            flag = false;
        }

        return flag;

        }

    </script>
</head>
<body>
<br><br><br><br><br><br><br>
    <table width="21%" border="1" cellspacing="0" cellpadding="25" align="center">
        <tr>
            <td>
                <form method="post" action="../controller/forgot-password-page2-process.php" onsubmit="return isValidForgotPassword2(this);">
                    <br>
                    <p>Answer this following question correctly in order to change your password.</p> <br><br>
                    <?php echo $securityQuestion; ?>
                    <br><br>
                    <div><span>Answer</span></div>
                    <input type="text" name="answer" id="answer" size="43px">
                    <br><font color="red" align="center" id="answerError"></font><br>
                    <div><span>New Password</span></div>
                    <input type="password" name="password" id="password" size="43px">
                    <br><font color="red" align="center" id="passwordError"></font><br>
                    <div><span>Confirm New Password</span></div>
                    <input type="password" name="cpassword" id="cpassword" size="43px">
                    <?php if (strlen($error_msg) > 0) { ?>
                        <br><br>
                        <font color="red" align="center"><?= $error_msg ?></font>
                    <?php } ?>
                    <br><font color="red" align="center" id="cpasswordError"></font><br>
                    <button name="submit">Change Password</button>
                </form>
            </td>
        </tr>
    </table>
</body>
</html>