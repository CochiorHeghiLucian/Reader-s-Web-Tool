<?php
session_start();
require_once '../app/models/profile_model.php';

class Profile extends Controller{

    public function index(){
       
        $this->view("profile/PersonalInfo_View"); 
    }

    public function getUserProfileInformation(){
        
        $userId = $_SESSION['userId'];
        $data = ProfileModel::getPersonalInfoData($userId);
        $data = json_encode($data);
        echo $data;
    }

    public function getSearchBooks(){
        $userId = $_SESSION['userId'];
        $title = file_get_contents('php://input');
       // echo $title;
        $data = ProfileModel::getSearchBooksFor($title, $userId);
        $data = json_encode($data);
       // print_r( $data);
        $_SESSION['bookSearchTitle'] = $title;
        $_SESSION['booksFound'] = $data;
        
       // header('Location:http://localhost/ProiectTWTEST/PUBLIC/searchBook');
      //  exit();
    }

}