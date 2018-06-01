<?php

session_start();

class SignIn extends Controller{
    
    public function index($name=''){

        $this->view("signIn/SignIn1_View");
    }   

    public function validateInput(){

        require_once '../app/models/auth_model.php';

        $receivedJSON = trim(file_get_contents("php://input"));
        $decodedReceivedJSON = json_decode($receivedJSON, true);

        if(Auth::validateAccount($decodedReceivedJSON['email'])=="valid"){

            echo "EmailAlreadyInDB";
        }
        else if($decodedReceivedJSON['email']!=$decodedReceivedJSON['retypeEmail']){

            echo "EmailNotMatchingRetypedEmail";
        }
        else if($decodedReceivedJSON['password']!=$decodedReceivedJSON['retypePassword']){

            echo "PasswordNotMatchingRetypedPassword";
        }
        else if($decodedReceivedJSON['male']==false && $decodedReceivedJSON['female']==false ){

            echo "GenderNotSelected";
        }
        else{

            $_SESSION['firstName'] = $decodedReceivedJSON['firstName'];
            $_SESSION['lastName'] = $decodedReceivedJSON['lastName'];
            $_SESSION['nickName'] = $decodedReceivedJSON['nickName'];
            $_SESSION['gender'] = $decodedReceivedJSON['male']==true ? "male" : "female";
            $_SESSION['dateOfBirth'] = $decodedReceivedJSON['dateOfBirth'];
            $_SESSION['phoneNo'] = $decodedReceivedJSON['phoneNo'];
            $_SESSION['email'] = $decodedReceivedJSON['email'];
            $_SESSION['password'] = $decodedReceivedJSON['password'];
            $_SESSION['street'] = $decodedReceivedJSON['street'];
            $_SESSION['apartment'] = $decodedReceivedJSON['apartment'];
            $_SESSION['country'] = $decodedReceivedJSON['country'];
            $_SESSION['city'] = $decodedReceivedJSON['city'];
            $_SESSION['ZIP'] = $decodedReceivedJSON['ZIP'];

            // how to store the images ???

            echo "RedirectToSignIn2";
        }

    }
} 
?>