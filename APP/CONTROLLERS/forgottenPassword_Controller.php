<?php

    /* Forgotten password Controller: */

   if($_POST){
       
       if(isset($_POST['email'])){
           
        $emailAddress=$_POST['email'];
        
        $adminUser='_*admin*_';
        $adminPwd='_+pwd+_';

        try{
            require_once '../MODELS/LogIn_Model.php';
            
            $logIn=new LogIn($adminUser,$adminPwd);
        
            if($logIn->getData()==TRUE)
            {
                $passWordToSend=$logIn->recoverPassword($emailAddress);
                
                /* Sending the forgotten password of the user 
                with the email $emailAddress: */
                
                require_once '/opt/lampp/htdocs/Proiect/vendor/phpmailer/phpmailer/src/PHPMailer.php';
                require_once '/opt/lampp/htdocs/Proiect/vendor/phpmailer/phpmailer/src/Exception.php';
                require_once '/opt/lampp/htdocs/Proiect/vendor/autoload.php';

                $mail = new PHPMailer\PHPMailer\PHPMailer();

                try { 
                    /* Server settings: */
                    
                    $mail->SMTPDebug = 1;                                 // Enable verbose debug output
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
                    $messageBody="<p><strong>Hello!</strong>"."<br>"."<br>"."Your password is:"."<br>"."<br>"."<strong>".$passWordToSend."<strong>"."<br>"."<br>"."Respectfully, the BooX team."."</p>";

                    /* Content: */
    
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = "BooX Account Password Recovery";
    
                    $mail->Body=$messageBody ;
                    $mail->AltBody =strip_tags($messageBody);

                    $mail->send();
                } catch (Exception $e){
                    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                }
                
                header('Location:../VIEWS/PHP/LogIn_View.php');
            }
        }
        catch(Exception $exception){
            echo $exception->getMessage();
        }
    }
}
?>