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
}