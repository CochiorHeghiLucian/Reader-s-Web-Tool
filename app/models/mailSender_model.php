<?php
require_once '../app/core/DB.php';
class mailSenderModel{
    public static function getUserName($id){
        
            $database = DB::getConnection();
         
            $query = "SELECT `USER_NAME` FROM `USERS` WHERE `USER_ID`=?";
            $stmt = $database->prepare($query);
            $stmt->bind_param("s", $id);
            $stmt->execute();
            $stmt->bind_result($userName);
            $stmt->fetch(); 
            
            return $userName;
            
            $stmt->close();
        
    }

    public static function getMailByUserName($userName){
        $database = DB::getConnection();
         
            $query = "SELECT `EMAIL_ADDR` FROM `USERS` WHERE `USER_NAME`=?";
            $stmt = $database->prepare($query);
            $stmt->bind_param("s", $userName);
            $stmt->execute();
            $stmt->bind_result($userEmail);
            $stmt->fetch(); 
            
            return $userEmail;
            
            $stmt->close();
    }

    public static function getIdByUserName($userName){
        $database = DB::getConnection();
         
            $query = "SELECT `USER_ID` FROM `USERS` WHERE `USER_NAME`=?";
            $stmt = $database->prepare($query);
            $stmt->bind_param("s", $userName);
            $stmt->execute();
            $stmt->bind_result($userId);
            $stmt->fetch(); 
            
            return $userId;
            
            $stmt->close();
    }

    public static function getInformationFormSendEmail($userId){
        $database = DB::getConnection();
         
            $query = "SELECT `FIRST_NAME`, `LAST_NAME`, `PHONE_NUMBER`  FROM `USERS` WHERE `USER_ID`=?";
            $stmt = $database->prepare($query);
            $stmt->bind_param("s", $userId);
            $stmt->execute();
            $stmt->bind_result($firstName, $lastName, $phoneNumber);
            $stmt->fetch(); 
        
            $stmt->close();

            $query = "SELECT `STREET`, `APARTAMENT`, `COUNTRY`, `CITY`, `ZIP_CODE`  FROM `USERS_ADDRESS` WHERE `USER_ID`=?";
            $stmt = $database->prepare($query);
            $stmt->bind_param("s", $userId);
            $stmt->execute();
            $stmt->bind_result($street, $apartament, $country, $city, $zipCode);
            $stmt->fetch(); 
            $stmt->close();

            $resultSet = array('firstName'=>$firstName, 'lastName'=>$lastName, 'phoneNumber'=>$phoneNumber, 'street'=>$street, 'country'=>$country, 'apartament'=>$apartament, 'city'=>$city, 'zipCode'=>$zipCode);
            return $resultSet;
    }

    public static function updateUserExchange($userId){
            $database = DB::getConnection();
         
            $query = "SELECT `NO_OF_EXCENGE` FROM `USERS` WHERE `USER_ID`=?";
            $stmt = $database->prepare($query);
            $stmt->bind_param("s", $userId);
            $stmt->execute();
            $stmt->bind_result($noOfExchange);
            $stmt->fetch(); 
            $noOfExchange = $noOfExchange +1;
            
            $stmt->close();

            $query = "UPDATE `USERS` SET `NO_OF_EXCENGE` = $noOfExchange  WHERE `USER_ID`=?";
            $stmt = $database->prepare($query);
            $stmt->bind_param("s", $userId);
            $stmt->execute();
            
            $stmt->close();
    }

    public static function updateBookExchange($title){
            $database = DB::getConnection();
         
            $query = "SELECT COUNT(*) FROM `BOOKS_STATISTICS` WHERE `BOOK_NAME`=?";
            $stmt = $database->prepare($query);
            $stmt->bind_param("s", $title);
            $stmt->execute();
            $stmt->bind_result($nr);
            $stmt->fetch(); 
            
            $stmt->close();

            if($nr == 0){
                $query = "INSERT INTO `BOOKS_STATISTICS`(`BOOK_NAME`, `NO_OF_EXCHANGES` ) VALUES (?,?)";
                $stmt = $database->prepare($query);
                $param = '1';
                $stmt->bind_param("ss", $title, $param);
                $stmt->execute();
        
                $stmt->close();

            }else{

                $query = "SELECT `NO_OF_EXCHANGES` FROM `BOOKS_STATISTICS` WHERE `BOOK_NAME` = ?";
                $stmt = $database->prepare($query);
                $stmt->bind_param("s", $title);
                $stmt->execute();
                $stmt->bind_result($noOfExchange);
                $stmt->fetch(); 
                $noOfExchange = $noOfExchange +1;
                $stmt->close();

                $query = "UPDATE `BOOKS_STATISTICS` SET `NO_OF_EXCHANGES` = $noOfExchange  WHERE `BOOK_NAME`=?";
                $stmt = $database->prepare($query);
                $stmt->bind_param("s", $title);
                $stmt->execute();
            
                $stmt->close();

            }

            
    }


}