<?php
class Auth{
    private $database;
    private $email, $passwaord;

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


}