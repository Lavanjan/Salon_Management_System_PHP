<?php session_start();
if(isset($_POST['Send_Email']))
//if(isset($_SESSION['uname']))
    {
    ?>
    <?php include "header1.php"; ?>
    <?php include "menu/mailmenu.php";
    include_once("connect.php");
    ?>

    <?php
    $mailto = $_POST['mail_to'];
    $mailSub = $_POST['mail_sub'];
    $mailMsg = $_POST['mail_msg'];
    require 'PHPMailer-master/PHPMailerAutoload.php';
    $mail = new PHPMailer();
    $mail->IsSmtp();
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl'; //'tls';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465; // or 587
    $mail->IsHTML(true);
    $mail->Username = "yourmail@gmail.com";
    $mail->Password = "Your password";
    $mail->SetFrom("geerthi65@gmail.com");
    $mail->Subject = $mailSub;
    $mail->Body = $mailMsg;
    $mail->AddAddress($mailto);

    if (!$mail->Send())
    {
        echo "Mail Not Sent";
    } else {
        echo "Mail Sent";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact V1</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>
<body>
<!--<form method="post" action="send_mail.php"> -->
<div class="contact1">
    <div class="container-contact1">
        <div class="contact1-pic js-tilt" data-tilt>
            <img src="images/img-01.png" alt="IMG">
        </div>

        <form method="post" action=<?php $_SERVER['PHP_SELF'] ?>class="contact1-form validate-form">
				<span class="contact1-form-title">
					Get in touch
				</span>

            <div class="wrap-input1 validate-input" data-validate = "Name is required">
                <input class="input1" type="text" name="mail_to" placeholder="Name">
                <span class="shadow-input1"></span>
            </div>
            <div class="wrap-input1 validate-input" data-validate = "Subject is required">
                <input class="input1" type="text" name="mail_sub" placeholder="Subject">
                <span class="shadow-input1"></span>
            </div>

            <div class="wrap-input1 validate-input" data-validate = "Message is required">
                <textarea class="input1" name="mail_msg" placeholder="Message"></textarea>
                <span class="shadow-input1"></span>
            </div>

        <input type="submit" Name="Send_Email" value="Send"> </input>

        </form>
    </div>
</div>




<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/tilt/tilt.jquery.min.js"></script>
<script >
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
</script>

<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>
</html>
