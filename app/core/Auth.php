<?php
class Auth{

    public static function validateUser($email, $password){
        
        require_once 'DB.php';
        $database = DB::getConnection();
     
        $query = "SELECT EMAIL_ADDR, PASSWORD FROM `USERS` WHERE `EMAIL_ADDR`=? AND `PASSWORD`=?";
        $stmt = $database->prepare($query);
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $stmt->bind_result($dbEmail, $dbPassword);
        $stmt->fetch();      
    
        if($dbEmail == $email && $dbPassword == $password){
            return "valid";
        }else{
            return "invalid";
        }
        
        $stmt->close();
    }

    public static function validateAccount($email){

        require_once 'DB.php';
        $database = DB::getConnection();

        $query = "SELECT `USER_NAME` FROM `USERS` WHERE `EMAIL_ADDR`=?";
        $stmt = $database->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($userName);
        $stmt->fetch();      
    
        if($userName != null){
            return "valid";
        }else{
            return "invalid";
        }
    
        $stmt->close();
    }

   public static function getUserIdByEmail($email){
        require_once 'DB.php';
    
        $database = DB::getConnection();
     
        $query = "SELECT `USER_ID` FROM `USERS` WHERE `EMAIL_ADDR`=?";
        $stmt = $database->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($userId);
        $stmt->fetch(); 
        
        return $userId;
        
        $stmt->close();

    }
}
?>
