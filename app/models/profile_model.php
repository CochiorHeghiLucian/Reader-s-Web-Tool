<?php
class Profile{

    public static function getLocation($userId){
        require_once '../core/DB.php';

        $database = DB::getConnection();
     
        $query = "SELECT COUNTRY, CITY, PASSWORD FROM `USERS_ADRESS` WHERE `USER_ID`=?";
        $stmt = $database->prepare($query);
        $stmt->bind_param("s", $userId);
        $stmt->execute();
        $stmt->bind_result($country, $city);
        $stmt->fetch(); 
        
        $locationArray.push($country, $city);
        return $locationArray;
    
        
        $stmt->close();

    }
}