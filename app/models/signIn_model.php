<?php
class SignIn{

    public static function insertIntoUsers($userId, $userName, $firstName, $lastName, $gender, $dateOfBirth, $phoneNumber, $emailAddress, $password){

        $database = DB::getConnection();
        
        $query = "INSERT INTO USERS (USER_ID, USER_NAME, FIRST_NAME, LAST_NAME, GENDER, DATE_OF_BIRTH, PHONE_NUMBER, EMAIL_ADDR, PASSWORD) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $database->prepare($query);

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $stmt->bind_param("sssssssss", $userId, $userName, $firstName, $lastName, $gender, $dateOfBirth, $phoneNumber, $emailAddress, $hashedPassword);

        if(!$stmt->execute()){
            return "failed the users DB insertion";
        }
        $stmt->fetch(); 
        $stmt->close();
    }

    public static function insertIntoUsers_Address($userId, $street, $apartment, $country, $city, $zip_code){

        $database = DB::getConnection();
        
        $query = "INSERT INTO USERS_ADDRESS (USER_ID, STREET, APARTMENT, COUNTRY, CITY, ZIP_CODE) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $database->prepare($query);
        $stmt->bind_param("ssssss", $userId, $street, $apartment, $country, $city, $zip_code);

        if(!$stmt->execute()){
            return "failed the users address DB insertion";
        }
        $stmt->fetch(); 
        $stmt->close();
    }
    
    public static function insertIntoUsers_Preferences($userId, $authors, $genres, $books, $quote){

        $database = DB::getConnection();
        
        $query = "INSERT INTO USERS_PREFERENCES (USER_ID, AUTHORS, GENRES, BOOKS, QUOTE) VALUES (?, ?, ?, ?, ?)";
        
        $stmt = $database->prepare($query);
        $stmt->bind_param("sssss", $userId, $authors, $genres, $books, $quote);
        if(!$stmt->execute()){
            return "failed the users preferences DB insertion";
        }
        $stmt->fetch(); 
        $stmt->close();
    }

    public static function insertIntoUsers_Personal_Info($userId, $facebookAccount, $twitterAccount){

        $database = DB::getConnection();
        
        $query = "INSERT INTO USERS_PERSONAL_INFO (USER_ID, FACEBOOK_ACCOUNT, TWITTER_ACCOUNT, ) VALUES (?, ?, ?)";

        $stmt = $database->prepare($query);
        $stmt->bind_param("sss", $userId, $facebookAccount, $twitterAccount);

        if(!$stmt->execute()){
            return "failed the users personal info DB insertion";
        }
        $stmt->fetch(); 
        $stmt->close();
    }
}
?>