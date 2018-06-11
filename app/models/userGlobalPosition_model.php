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

    public static function usersCoordinates($userId){

        require_once '../app/core/DB.php';

        $database = DB::getConnection();

        $query = "SELECT `LATITUDE`, `LONGITUDE`, `EMAIL_ADDR`, `PHONE_NUMBER` FROM `USERS_OBSERVERS`uo JOIN `USERS` u ON uo.USER_ID=u.USER_ID WHERE u.USER_ID != ?";

        $stmt = $database->prepare($query);

        $stmt->bind_param("s", $userId);

        if(!$stmt->execute()){
            return "failled to return user coordinates";
        }

        $stmt->store_result();
        $stmt->bind_result($latitude, $longitude, $email, $phoneNumber);

        $resultArray = array();
        
        while($stmt->fetch()) {

            $line = array("latitude" => $latitude, "longitude" => $longitude, "email" =>$email, "phoneNumber" =>$phoneNumber);
            $resultArray[] = $line;
        }

        $stmt->free_result();

        return array_values($resultArray);
    }

    public static function getMyCoordinates($userId){

        require_once '../app/core/DB.php';

        $database = DB::getConnection();

        $query = "SELECT `LATITUDE`, `LONGITUDE`, `EMAIL_ADDR`, `PHONE_NUMBER` FROM `USERS_OBSERVERS`uo JOIN `USERS` u ON uo.USER_ID=u.USER_ID WHERE u.USER_ID= ?";

        $stmt = $database->prepare($query);

        $stmt->bind_param("s", $userId);

        if(!$stmt->execute()){
            return "failled to return user coordinates";
        }

        $stmt->store_result();
        $stmt->bind_result($latitude, $longitude, $email, $phoneNumber);

        $resultArray = array();
        
        while($stmt->fetch()) {

            $line = array("latitude" => $latitude, "longitude" => $longitude, "email" =>$email, "phoneNumber" =>$phoneNumber);
            $resultArray[] = $line;
        }

        $stmt->free_result();

        return array_values($resultArray);
    }
}
?>

