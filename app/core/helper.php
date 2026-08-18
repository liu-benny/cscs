<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
session_start();

    // for login feature if needed
    // function isLoggedIn(){
    //     if(isset($_SESSION['user_id'])){
    //       return true;
    //     } else {
    //       return false;
    //     }
    //   }

// dd1b95d35dec0eb2656e27e28d6d19e2
  function sendmail($subject,$body) {
    

    require dirname(__DIR__, 2) . '/vendor/autoload.php'; // Path to PHPMailer autoload

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.encs.concordia.ca'; 
        $mail->SMTPAuth   = false; // Disable authentication for internal ENCS network
        $mail->Port       = 25;    // Standard SMTP port for ENCS internal
        
        // No Username or Password needed internally

        // Recipients
        $mail->setFrom('l_benny@encs.concordia.ca', 'Benny Liu');
        $mail->addAddress('wrc353_1@encs.concordia.ca');

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $body;

        $mail->send();
        // echo 'Message has been succesfully sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    
}
?>