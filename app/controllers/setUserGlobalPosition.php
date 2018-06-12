<?php
session_start();
class SetUserGlobalPosition extends Controller{

    public function index($name=''){

        require_once '../app/models/userGlobalPosition_model.php';

        $userId = $_SESSION['userId'];
        
        $receivedJSON = trim(file_get_contents("php://input"));
        $decodedReceivedJSON = json_decode($receivedJSON, true);

        $flag=true;

        if(UserGlobalPosition::insertOrUpdate($userId) == "insert"){

            if(UserGlobalPosition::insertIntoUsers_Observers($userId, $decodedReceivedJSON['latitude'], $decodedReceivedJSON['longitude'])=="failled the users DB insertion");
                $flag=false;
        }
        else{

            if(UserGlobalPosition::updateIntoUsers_Observers($userId, $decodedReceivedJSON['latitude'], $decodedReceivedJSON['longitude']=="failled the users DB update"));
                $flag=false;
        }
        
        echo $flag;
    }
}
?>