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
        $title = file_get_contents('php://input');
       // echo $title;
        $data = ProfileModel::getSearchBooksFor($title);
       // $data = json_encode($data);
       // print_r( $data);
        echo json_encode ($data, JSON_FORCE_OBJECT);
       // header('Location:http://localhost/ProiectTWTEST/PUBLIC/searchBook');
      //  exit();
    }

}