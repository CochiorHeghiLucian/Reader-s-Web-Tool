<?php
session_start();
class ChangePassword extends Controller{
    
    public function index($name=''){
        
        $this->view("changePassword/ChangePassword_View");
    }

    public function validateInput(){

        require_once '../app/models/auth_model.php';
        require_once '../app/core/Email.php';

        $receivedJSON = trim(file_get_contents("php://input"));
        $decodedReceivedJSON = json_decode($receivedJSON, true);

        if($decodedReceivedJSON['changePassword'] != $decodedReceivedJSON['retypePassword']){

            echo "PasswordNotMatchingRetypedPassword";
        }
        else if(Auth::validateAccount($decodedReceivedJSON['email']) != "valid"){

            echo "invalidEmail";
        }
        else{

            $changedPassword = $decodedReceivedJSON['changePassword'];
            $email= $decodedReceivedJSON['email'];

            Auth::changePassword($email, $changedPassword);

            $confirmationMessage="<p><strong>Hello!</strong>"."<br>"."<br>"."Your new BooX account password is:"."<br>"."<br>"."<strong>".$changedPassword."</strong>"."<br>"."<br>"."Respectfully, the BooX team."."</p>";

            Email::sendEmail($email, $confirmationMessage);
            
            echo "RedirectToLogIn";
        }
    }
}
?>