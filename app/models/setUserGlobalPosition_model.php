<?php
class UpdateUserGlobalPosition{

    public static function insertIntoUsers_Observers($userId, $latitude, $longitude){

        require_once '../app/core/DB.php';

        $database = DB::getConnection();
        
        $query = "INSERT INTO USERS_OBSERVERS (USER_ID,LATITUDE,LONGITUDE) VALUES (?, ?, ?)";
        $stmt = $database->prepare($query);

        $stmt->bind_param("sss", $userId, $latitude, $longitude);

        if(!$stmt->execute()){
            return "failled the users DB insertion";
        }
        $stmt->fetch(); 
        $stmt->close();
    }
}
?>