<?php
session_start();
class SetUserGlobalPosition extends Controller{

    public function index($name=''){

        require_once '../app/models/setUserGlobalPosition_model.php';

        $userId = $_SESSION['userId'];
        
        $receivedJSON = trim(file_get_contents("php://input"));
        $decodedReceivedJSON = json_decode($receivedJSON, true);

        if(UserGlobalPosition::insertOrUpdate($userId) == "insert"){

            UserGlobalPosition::insertIntoUsers_Observers($userId, $decodedReceivedJSON['latitude'], $decodedReceivedJSON['longitude']);
        }
        else if(UserGlobalPosition::insertOrUpdate($userId) == "update"){

            UserGlobalPosition::updateIntoUsers_Observers($userId, $decodedReceivedJSON['latitude'], $decodedReceivedJSON['longitude']);
        }
        
        echo "OK";
    }
}
?>