<?php

class ForgottenPassword extends Controller{

    public function index($name=''){

        require_once '../app/models/auth_model.php';
        require_once '../app/core/Email.php';

        $this->view("forgottenPassword/ForgottenPassword_View");

        if(!empty($_POST['email'])){

            $emailAddress = $_POST['email'];

            if(Auth::validateAccount($emailAddress)=="valid"){

                /* Retrieving the forgotten password from the DB  
                and sending it to the user to his email address: */

                $passwordToBeSent=Auth::getPassword($emailAddress);
                
                $messageBody="<p><strong>Hello!</strong>"."<br>"."<br>"."Your password is:"."<br>"."<br>"."<strong>".$passwordToBeSent."</strong>"."<br>"."<br>"."Respectfully, the BooX team."."</p>";
                
                Email::sendEmail($emailAddress, $messageBody);

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