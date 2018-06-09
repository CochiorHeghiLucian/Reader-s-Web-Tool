<?php
class UserGlobalPosition{

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

    public static function updateIntoUsers_Observers($userId, $latitude, $longitude){

        require_once '../app/core/DB.php';

        $database = DB::getConnection();
        
        $query = "UPDATE USERS_OBSERVERS SET LATITUDE = ?, LONGITUDE = ? WHERE USER_ID = ?";
        $stmt = $database->prepare($query);

        $stmt->bind_param("sss", $latitude, $longitude, $userId);

        if(!$stmt->execute()){
            return "failled the users DB update";
        }
        $stmt->fetch(); 
        $stmt->close();
    }

    public static function insertOrUpdate($userId){

        require_once '../app/core/DB.php';

        $database = DB::getConnection();
        
        $query = "SELECT COUNT(*) FROM USERS_OBSERVERS WHERE USER_ID = ?";
        $stmt = $database->prepare($query);

        $stmt->bind_param("s", $userId);
       
        if(!$stmt->execute()){
            return "failled the users DB insertion";
        }

        $stmt->bind_result($counter);
        $stmt->fetch(); 

        if($counter == 0){
            return "insert";
        }
        else{
            return "update";
        }
        $stmt->close();
    }
}
?>

