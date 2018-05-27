<?php
class Profile extends Controller{

    public function index(){
        require_once '../models/profile_model.php';
        session_start();
        $data = array();

        if(isset($_SESSION['userId'])){
            $userId = $_SESSION['userId']
            $data.push(array_values(Profile::getLocation($userId)));
        }

        $this->view("profile/PersonalInfo_View", $data);
    }
}