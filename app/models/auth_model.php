<?php
class Auth{

    public static function validateUser($email, $password){
        
        require_once '../app/core/DB.php';
        require_once '../app/core/Encryption.php';

        $database = DB::getConnection();

        $queryCount = "SELECT COUNT(*) FROM `USERS` WHERE `EMAIL_ADDR`=?";
        $stmt1 = $database->prepare($queryCount);
        $stmt1->bind_param("s", $email);
        $stmt1->execute();
        $stmt1->bind_result($count);
        $stmt1->fetch();
        $stmt1->close();

        if($count < 1){
            return "invalidEmail";
        }

        $query = "SELECT `PASSWORD` FROM `USERS` WHERE `EMAIL_ADDR`=?";
        $stmt = $database->prepare($query);
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $stmt->bind_result($hashedPassword);
        $stmt->fetch();

        if(password_verify($password, $hashedPassword)){

            return "valid";
        }
        else{

            return "invalidPassword";
        }
    }

    public static function validateAccount($email){

        require_once '../app/core/DB.php';

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

    public static function validateUsername($userName){

        require_once '../app/core/DB.php';

        $database = DB::getConnection();

        $query = "SELECT COUNT(*) FROM `USERS` WHERE `USER_NAME`=?";
        $stmt = $database->prepare($query);
        $stmt->bind_param("s", $userName);
        $stmt->execute();
        $stmt->bind_result($userNameInDBCounter);
        $stmt->fetch();      
    
        if($userNameInDBCounter > 0){
            return "invalidUserName";
        }else{
            return "validUserName";
        }
    
        $stmt->close();
    }

   public static function getUserIdByEmail($email){

        require_once '../app/core/DB.php';
    
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

    public static function getLargestIdInDB(){

        require_once '../app/core/DB.php';

        $database = DB::getConnection();

        $query="SELECT MAX(USER_ID) FROM USERS";
        $stmt=$database->prepare($query);
        $stmt->execute();
        $stmt->bind_result($largestIdInDB);
        $stmt->fetch();
        $stmt->close();

        return $largestIdInDB;
    }

    public static function changePassword($email, $changedPassword){

        require_once '../app/core/DB.php';

        $database = DB::getConnection();

        $query="UPDATE `USERS` SET `PASSWORD`=? WHERE `EMAIL_ADDR`=?";
        $stmt=$database->prepare($query);

        $hashedPassword = password_hash($changedPassword, PASSWORD_BCRYPT);
        
        $stmt->bind_param("ss", $hashedPassword, $email);
        $stmt->execute();
        $stmt->close();
    }
}
?>
