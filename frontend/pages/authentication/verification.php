<?php
session_start();
use Twilio\Rest\Client;
require '../../../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once "../../../vendor/autoload.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $sid = "AC240112cb42f42b094167c7f84708bfba";
    $token = "e437371368400c566fee6e8268866bd1";
    if (!empty($phone)) {
        // Generate a verification code
        $verificationCode = rand(100000, 999999);
        $_SESSION['verification_code'] = $verificationCode;
        try {
            $twilio = new Client($sid, $token);
            $message = $twilio->messages->create(
                $phone, // to
                [
                    "body" => "Your verification code is: $verificationCode",
                    "from" => "+15746756752" // Your Twilio phone number
                ]
            );
            $_SESSION['verification_method'] = 'phone';
            $_SESSION['contact_info'] = $phone;
            header('Location: verify.php');
        } catch (Exception $e) {
            $_SESSION['error'] = "Error: " . $e->getMessage();
            header('Location: index.php'); // Redirect back to the form
        }
    } elseif (!empty($email)) {
        $verificationCode = rand(100000, 999999);
        $_SESSION['verification_method'] = 'email';
        $_SESSION['contact_info'] = $email;
        $_SESSION['verification_code'] = $verificationCode;
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
            $mail->isHTML(true);
            $mail->Subject = 'Verify your Email';
            $mail->Body = "Your email verification code is: $verificationCode" ;
            $mail->AltBody = 'Verification Code';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }


        header('Location: verify.php');
    } else {
        $_SESSION['error'] = "Please enter either a phone number or an email address.";
        header('Location: ../../index.php'); // Redirect back to the form
    }
    exit;
}
include '../../php/auth/auth_login.php';
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
                            <h4 class="mt-3 text-primary">Verify Your account</h4>
                            <small class="text-muted">how would like to verify your account?</small>
                            <form class="mt-5 mb-5" method="post" action="">
                                <div class="mb-3">
                                    <div class="d-flex align-items-left">
                                        <label class="form-check-label mb-1" for="phone">Phone Number</label>
                                    </div>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="phone" id="phone"
                                            placeholder="e.g., +610987654325" />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex align-items-left">
                                        <label class="form-check-label mb-1" for="email">Email Address</label>
                                    </div>
                                    <div class="input-group">
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="e.g., someone@someone.com" />
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary w-100 p-2 mt-4">Send
                                    Verification Code</button>
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