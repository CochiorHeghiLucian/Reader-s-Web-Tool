<?php

class ForgottenPassword extends Controller{

    public function index($name=''){

        require_once '../app/core/Auth.php';

        $this->view("forgottenPassword/ForgottenPassword_View");

        if(!empty($_POST['email'])){

            $emailAddress = $_POST['email'];

            if(Auth::validateAccount($emailAddress)=="valid"){

                $passwordToBeSent=Auth::getPassword($emailAddress);

                /* Sending the forgotten password of the user 
                with the email $emailAddress: */
                
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

                    $mail->setFrom("betiucciprian@gmail.com");
                    $mail->addAddress($emailAddress);                     // Add a recipient
                    $messageBody="<p><strong>Hello!</strong>"."<br>"."<br>"."Your password is:"."<br>"."<br>"."<strong>".$passwordToBeSent."</strong>"."<br>"."<br>"."Respectfully, the BooX team."."</p>";

                    /* Content: */
    
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = "BooX Account Password Recovery";
    
                    $mail->Body=$messageBody ;
                    $mail->AltBody =strip_tags($messageBody);

                    $mail->send();
                    
                } catch (Exception $e){
                    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                }
                
                header('Location:http://localhost/ProiectTWTEST/PUBLIC/login');
                exit();
            }
            else{
            
                header('Location:http://localhost/ProiectTWTEST/PUBLIC/forgottenPassword/viewError/invalidEmail');
                exit();
            }
        } 
    }

    public function viewError($data = []){

        $this->view('forgottenPassword/ForgottenPassword_View', ['error'=>$data]);
    }
}
?>