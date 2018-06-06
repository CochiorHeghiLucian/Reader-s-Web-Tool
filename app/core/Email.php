<?php
class Email{

   public static function sendEmail($emailAddress, $messageBody){
       
    require_once '/opt/lampp/htdocs/ProiectTWTEST/app/PHPMailer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require_once '/opt/lampp/htdocs/ProiectTWTEST/app/PHPMailer/vendor/phpmailer/phpmailer/src/Exception.php';
    require_once '/opt/lampp/htdocs/ProiectTWTEST/app/PHPMailer/vendor/autoload.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer();

    try { 
        /* Server settings: */
        
        $mail->SMTPDebug = 0;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = "smtp.gmail.com";                       // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username ="BooXWebTool@gmail.com";             // SMTP username
        $mail->Password = "BooX_PWD";                         // SMTP password
        $mail->SMTPSecure = "ssl";                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to

        /* Recipients: */

        $mail->setFrom("BooXWebTool@gmail.com");
        $mail->addAddress($emailAddress);                     // Add a recipient
        
        /* Content: */

        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = "BooX Account Password Recovery";

        $mail->Body=$messageBody ;
        $mail->AltBody =strip_tags($messageBody);

        $mail->send();
    } catch (Exception $e){
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
   }
}
?>