<?php
session_start();
class SignIn2 extends Controller{
    
    public function index($name=''){

        $this->view("signIn2/SignIn2_View");
    }   

    function console_log( $data ){
        
        echo '<script>';
        echo 'console.log('. json_encode( $data ) .')';
        echo '</script>';
    }

    public function validateInput(){

        $receivedJSON = trim(file_get_contents('php://input'));
        $decodedReceivedJSON = json_decode($receivedJSON, true);

        if($decodedReceivedJSON['termsOfUseCheckbox'] == false){

            echo "TermsOfUseNotChecked";
        }
        else{

            require_once '../app/models/auth_model.php';
            require_once '../app/models/signIn_model.php';

            $authors = $decodedReceivedJSON['authors'];
            $genres = $decodedReceivedJSON['genres'];
            $books = $decodedReceivedJSON['books'];
            $quote = $decodedReceivedJSON['quote'];
        }
    }
} 
?>