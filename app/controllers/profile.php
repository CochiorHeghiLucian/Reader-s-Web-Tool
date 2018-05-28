<?php
 session_start();
class Profile extends Controller{

    public function index(){
        require_once '../app/models/profile_model.php';
       
        $data = array();
        

        if(isset($_SESSION['userId'])){
            $userId = $_SESSION['userId'];
            $data = ProfileModel::getPersonalInfoData($userId);
            
            $this->view("profile/PersonalInfo_View", $data);
        }

        
    }
}