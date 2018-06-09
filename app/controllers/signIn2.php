<?php
session_start();
class SignIn2 extends Controller{
    
    public function index($name=''){

        $this->view("signIn2/SignIn2_View");
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

            $largestIdInDB=Auth::getLargestIdInDB();

            if($largestIdInDB<1 || $largestIdInDB == null)
            {
                $nextUserIdInDB=1;
            }
            else{

                $nextUserIdInDB=$largestIdInDB+1;
            }
            
            $userName = $_SESSION['nickName'];
            $firstName = $_SESSION['firstName'];
            $lastName = $_SESSION['lastName'];
            $gender = $_SESSION['gender'];
            $dateOfBirth = $_SESSION['dateOfBirth'];
            $phoneNumber = $_SESSION['phoneNo'];
            $emailAddress = $_SESSION['email'];
            $password = $_SESSION['password'];

            SignIn::insertIntoUsers($nextUserIdInDB, $userName, $firstName, $lastName, $gender, $dateOfBirth, $phoneNumber, $emailAddress, $password);

            $street = $_SESSION['street'];
            $apartment = $_SESSION['apartment'];
            $country = $_SESSION['country'];
            $city = $_SESSION['city'];
            $ZIP = $_SESSION['ZIP'];

            SignIn::insertIntoUsers_Address($nextUserIdInDB, $street, $apartment, $country, $city, $ZIP);

            $authors = $decodedReceivedJSON['authors'];
            $genres = $decodedReceivedJSON['genres'];
            $books = $decodedReceivedJSON['books'];
            $quote = $decodedReceivedJSON['quote'];

            SignIn::insertIntoUsers_Preferences($nextUserIdInDB, $authors, $genres, $books, $quote);

            // $facebookAccount = $decodedReceivedJSON['facebook'];
            // $twitterAccount = $decodedReceivedJSON['twitter'];

            // SignIn::insertIntoUsers_Personal_Info($nextUserIdInDB, $facebookAccount, $twitterAccount);

            echo "redirectToLogIn";
        }
    }
} 
?>