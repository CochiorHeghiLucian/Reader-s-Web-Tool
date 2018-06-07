<?php

class ForgottenPassword extends Controller{

    public function index($name=''){

        require_once '../app/models/auth_model.php';
        require_once '../app/core/Email.php';

        $this->view("forgottenPassword/ForgottenPassword_View");

        if(!empty($_POST['email'])){

            $emailAddress = $_POST['email'];

            if(Auth::validateAccount($emailAddress)=="valid"){
                
                $messageBody="<p><strong>Hello!</strong>"."<br>"."<br>"."Ooops .. it seems like you forgot your BooX account password."."<br>"."<br>"."Please change your password at the following link:"."<br>"."<br>"."http://localhost/ProiectTWTEST/PUBLIC/changePassword"."<br>"."<br>"."Respectfully, the BooX team."."</p>";
                
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