<?php 
session_start();
include("config.php");
require 'vendor/autoload.php';

$error = "";
$msg = "";

function generateOTP() {
    return rand(100000, 999999);
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendOTP($to, $otp) {
    $mail = new PHPMailer(true);
    
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'janvimarakna1304@gmail.com';
        $mail->Password = 'irhg qwav rkad gbwh';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        
        $mail->setFrom('janvimarakna1304@gmail.com', 'janvi');
        $mail->addAddress($to);
        $mail->isHTML(true);
        $mail->Subject = 'Password Reset OTP';
        $mail->Body = "Your OTP for password reset is: $otp";
        
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

if(isset($_POST['send_otp'])) {
    $email = $_POST['email'];
    $otp = generateOTP();
    $_SESSION['otp'] = $otp; // Store OTP in session
    $otp2 = sendOTP($email, $otp);
    
    if($otp2) {
        $msg = "<p class='alert alert-success'>OTP has been sent to your email address.</p>";
    } else {
        $error = "<p class='alert alert-danger'>Failed to send OTP. Please try again later.</p>";
    }
}

if(isset($_POST['submit_otp'])) {
    $entered_otp = $_POST['submitotp'];
    $stored_otp = $_SESSION['otp']; // Retrieve OTP from session
    
    if($entered_otp == $stored_otp) {
        // If OTP is correct, redirect to reset password page
        header('location: reset_pass.php');
        exit();
    } else {
        $error = "<p class='alert alert-danger'>Invalid OTP. Please try again.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Your HTML head content -->
    <!-- Required meta tags -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Meta Tags -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="shortcut icon" href="images/favicon.ico">

<!--	Fonts
	========================================================-->
<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">

<!--	Css Link
	========================================================-->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="css/layerslider.css">
<link rel="stylesheet" type="text/css" href="css/color.css">
<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/login.css">

<!--	Title
	=========================================================-->
<title>Real Estate PHP</title>
</head>
<body>
    <!-- Your HTML body content -->
    <div id="page-wrapper">
        <!-- Your page content -->
        <!-- Form for sending OTP -->
        <form method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" placeholder="Your Email" required>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" name="send_otp" type="submit">Send OTP</button>
            </div>
        </form>

        <!-- Form for OTP submission -->
        <form method="post">
            <div class="form-group">
                <label for="submitotp">Enter OTP:</label>
                <input type="text" name="submitotp" class="form-control" placeholder="Enter OTP" required>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" name="submit_otp" type="submit">Submit OTP</button>
            </div>
        </form>

        <!-- Display error or success messages -->
        <?php echo $error; ?>
        <?php echo $msg; ?>
    </div>

    <!-- Js Link -->
    <!-- Include your JavaScript files -->
</body>
</html>
