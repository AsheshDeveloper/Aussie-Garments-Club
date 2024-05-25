<?php 
session_start();
require_once "../../../vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    echo "testing";    
 $email = $_POST['email'];
$verificationCode = rand(100000, 999999);
$_SESSION['verification_code'] = $verificationCode;
echo $verificationCode;
// Example: send email code logic here
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.office365.com'; // Or 'smtp-mail.outlook.com'
    $mail->SMTPAuth = true;
    $mail->Username = 'aussiegarmentclub@outlook.com';
    $mail->Password = 'An1l@123456';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('aussiegarmentclub@outlook.com', 'Aussie Garment');
    $mail->addAddress($email, '');
    echo $email;
    $mail->isHTML(true);
    $mail->Subject = 'Verify your Email';
    $mail->Body = "Your email verification code is: $verificationCode" ;
    $mail->AltBody = 'Verification Code';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
header('Location: verify_pwd_reset.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- header section include -->
    <?php
    include '../../includes/head_section.html';
    ?>
    <!-- app icon -->
    <link rel="icon" href="../../images/favicon.png" />
    <!-- custom css -->
    <link rel="stylesheet" href="../../assets/style.css" />

    <title>Aussie Garments</title>
</head>

<body>
    <!-- navigation  -->
    <nav class="nav-wrapper">
        <!-- top navigation -->
        <?php 
        include '../../includes/nav_top.php';
    ?>
        <!-- main nav bar -->
        <?php 
        include '../../includes/nav_main.php';
    ?>
    </nav>

    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mx-auto">
                    <div class="card shadowed-card p-4 mt-5 mb-5">
                        <div class="card-body text-center">
                            <h4 class="mt-3 text-primary">Reset Password</h4>
                            <small class="text-muted">Enter email to reset password. We will send a verification code.</small>
                            <form class="mt-5 mb-5" method="post" action="">
                                <div class="mb-3">
                                    <div class="d-flex align-items-left">
                                        <label class="form-check-label mb-1" for="email"> Email Address<span
                                                class="text-danger">*</span></label>
                                    </div>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="email" id="email"
                                            placeholder="enter the email address" required />
                                        <button class="btn btn-outline-secondary" type="submit"
                                            id="toggleConfirmPassword">
                                            <i class="fa fa-refresh"></i>
                                        </button>
                                    </div>
                                    <div class="d-flex align-items-left mt-1">
                                        <small class=" ">click the button on the side to send the code again</small>
                                    </div>
                                </div>

                                <button type="submit"
                                    class="btn btn-primary w-100 p-2 mt-4 mb-2">Send verification code</a>
                                <!-- <small class="">Try another way? <a href="./verification.php">CLick Me</a></small> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
        // Include footer
        include '../../includes/footer.php';
    ?>
    <!-- Optional JavaScript -->

</body>

</html>