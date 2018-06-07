<?php
session_start();
require_once '../app/models/mailSender_model.php';
require_once '../app/core/Email.php';
require_once '../app/models/yourBooks_model.php';
require_once '../app/models/booxWishlist_model.php';

class MailSender extends Controller{


    public static function sendMail(){
        $jsonData = file_get_contents('php://input');
        $jsonData = json_decode($jsonData);
        $name = $jsonData->name;
        $title = $jsonData->title;  // title -> cartea care se da la schimb
        $userTitle = $jsonData->userTitle; // cartea care se vrea la schimb
        $userId = $_SESSION['userId'];
        $userName = mailSenderModel::getUserName($userId);

        $userEmail1 = mailSenderModel::getMailByUserName($userName); //persoana care vrea sa faca schimb
        $userEmail2 = mailSenderModel::getMailByUserName($name);        //persoana de la care se vrea a se face schimb

      //  echo $userEmail1 . "->". $userEmail2. "\n";

        $msg = '<p>
                    Userul doreste sa schimbe cartea dumneavoastra '. $userTitle . ' si este dispus sa va ofere cartea ' . $title .
                "</p>
                <br>" . 
                "<p>
                    Pentru a accepta schimbul si a primi datele de contact apasati  
                    <a href='http://localhost/ProiectTWTEST/PUBLIC/mailSender/accept/" . $userName."/".$name ."/".$userTitle."/".$title."'>aici</a></p>". 
                "<br>".
                "<p>Pentru a refuza  schimbul apasati  <a href='http://localhost/ProiectTWTEST/PUBLIC/mailSender/refuz/" . $userName."/".$name ."'>aici</a></p>".
                "<br><p>Multimim, echipa BooxWebTool! </p>";
       
      //  echo $msg;

        Email::sendEmail($userEmail2, $msg);

    }

    public static function accept($userName1 = '', $userName2 = '',$titlu1='', $titlu2=''){
        //incarc un view
        $userId1 = mailSenderModel::getIdByUserName($userName1);
        $userId2 = mailSenderModel::getIdByUserName($userName2);

        $userEmail1 = mailSenderModel::getMailByUserName($userName1);
        $userEmail2 = mailSenderModel::getMailByUserName($userName2);

        //$data = $userId1." -> ". $userId2. " -> ". $userEmail1. " -> ". $userEmail2. " -> ".$titlu1. " -> ".$titlu2;

        $data = "Cererea a fost trimisa la  server urmeasa sa primiti un emai cu datele utilizatorului de la care doriti sa faceti schimbul.";

        //preiau datele de contact de la fiecare id si pregatesc un mesaj cu acele date
        $dateContact1 = mailSenderModel::getInformationFormSendEmail($userId1);
        $msg1 = self::prepareMsg($dateContact1);

        $dateContact2 = mailSenderModel::getInformationFormSendEmail($userId2);
        $msg2 = self::prepareMsg($dateContact2);

        //trimit mail unul la celalalt cu informatiile de contact

        Email::sendEmail($userEmail1, $msg2);
        Email::sendEmail($userEmail2, $msg1);


        //update DB No_Exchanges pentru users si books
        mailSenderModel::updateUserExchange($userId1);
        mailSenderModel::updateUserExchange($userId2);
        
        mailSenderModel::updateBookExchange($titlu1);
        mailSenderModel::updateBookExchange($titlu2);




        //sterg dib baza de date cartile la care s-au facut swich
        YourBooksModel::deleteBookFromDB($userId1, $titlu2);
        YourBooksModel::deleteBookFromDB($userId2, $titlu1);

        BooxWishlistModel::deleteBookFromDB($userId1, $titlu1);
        BooxWishlistModel::deleteBookFromDB($userId2, $titlu2);

        $this->view('email/acceptEmail_View', ['info'=> $data]);

    }

    private static function prepareMsg($informationData){
        //array('firstName', 'lastName', 'phoneNumber', 'street', 'country', 'apartament', 'city', 'zipCode');
        $msg = "<p> Datele de contact ale utilizatorului sunt: </p>".
                "<p>Nume: ". $informationData['firstName']." ". $informationData['lastName']  ." </p>".
                "<p>Numar de telefon: ". $informationData['phoneNumber'] ."</p>".
                "<p>Country: ". $informationData['country'] ."</p>".
                "<p>City: ". $informationData['city'] ."</p>".
                "<p>Apartament: ". $informationData['apartament'] ."</p>".
                "<p>Zip COde: ". $informationData['zipCode'] ."</p>".
                "<p>Cu drag, echipa BooXWebTool! </p>"
                ;
        return $msg;
    }

    public static function refuz($userName1='', $userName2=''){
        $userEmail1 = mailSenderModel::getMailByUserName($userName1);
        $userEmail2 = mailSenderModel::getMailByUserName($userName2);

        $msg = "<p>"
                ."Userul ". $userName2 . "nu doreste sa faca schimbul de carte".
                 "</p>";

        Email::sendEmail($userEmail1, $msg);
        $data = "Cererea a fost trimisa la  server.";
        $this->view('email/acceptEmail_View', ['info'=> $data]);
    }

    

}