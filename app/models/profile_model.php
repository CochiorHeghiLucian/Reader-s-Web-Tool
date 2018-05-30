<?php
class ProfileModel{

    public static function getPersonalInfoData($userId){

        $personalInfoData['rating'] = self::getRating($userId);
        $personalInfoData['twitter'] = self::getTwitterAccount($userId);
        $personalInfoData['facebook'] = self::getFacebookAccount($userId);
        $personalInfoData['location'] = self::getLocation($userId);
        $personalInfoData['quote'] = self::getQuote($userId);
        $personalInfoData['authors'] = self::getAuthors($userId);
        $personalInfoData['genres'] = self::getGenres($userId);
        $personalInfoData['books'] = self::getBooks($userId);

        return $personalInfoData;
    }

    private static function getQuote($userId){

        require_once '../app/core/DB.php';

        $database = DB::getConnection();
     
        $query = "SELECT `QUOTE` FROM `USERS_PREFERENCES` WHERE `USER_ID`=?";
        $stmt = $database->prepare($query);
        $stmt->bind_param("s", $userId);
        $stmt->execute();
        $stmt->bind_result($quote);
        $stmt->fetch(); 
        
        return $quote;
    
        $stmt->close();
    }
    
    private static function getRating($userId){

        require_once '../app/core/DB.php';

        $database = DB::getConnection();
     
        $query = "SELECT `RATING` FROM `USERS_PERSONAL_INFO` WHERE `USER_ID`=?";
        $stmt = $database->prepare($query);
        $stmt->bind_param("s", $userId);
        $stmt->execute();
        $stmt->bind_result($rating);
        $stmt->fetch(); 
        
        return $rating;
    
        $stmt->close();
    }

    private static function getTwitterAccount($userId){

        require_once '../app/core/DB.php';

        $database = DB::getConnection();
     
        $query = "SELECT `TWITTER_ACCOUNT` FROM `USERS_PERSONAL_INFO` WHERE `USER_ID`=?";
        $stmt = $database->prepare($query);
        $stmt->bind_param("s", $userId);
        $stmt->execute();
        $stmt->bind_result($twitterAccount);
        $stmt->fetch(); 
        
        return $twitterAccount;
        
        $stmt->close();
    }

    private static function getFacebookAccount($userId){

        require_once '../app/core/DB.php';

        $database = DB::getConnection();
     
        $query = "SELECT `FACEBOOK_ACCOUNT` FROM `USERS_PERSONAL_INFO` WHERE `USER_ID`=?";
        $stmt = $database->prepare($query);
        $stmt->bind_param("s", $userId);
        $stmt->execute();
        $stmt->bind_result($facebookAccount);
        $stmt->fetch(); 
        
        return $facebookAccount;
    
        $stmt->close();
    }

    private static function getLocation($userId){

        require_once '../app/core/DB.php';

        $database = DB::getConnection();
     
        $query = "SELECT `COUNTRY`, `CITY` FROM `USERS_ADDRESS` WHERE `USER_ID`=?";
        $stmt = $database->prepare($query);
        $stmt->bind_param("s", $userId);
        $stmt->execute();
        $stmt->bind_result($country, $city);
        $stmt->fetch(); 
        
        $locationArray = array($country, $city);
        
        return $locationArray;
    
        $stmt->close();
    }

    private static function getAuthors($userId){

        require_once '../app/core/DB.php';

        $database = DB::getConnection();
     
        $query = "SELECT `AUTHORS` FROM `USERS_PREFERENCES` WHERE `USER_ID`=?";
        $stmt = $database->prepare($query);
        $stmt->bind_param("s", $userId);
        $stmt->execute();
        $stmt->bind_result($authors);
        $stmt->fetch(); 
        
        return $authors;
    
        $stmt->close();
    }

    private static function getGenres($userId){

        require_once '../app/core/DB.php';

        $database = DB::getConnection();
     
        $query = "SELECT `GENRES` FROM `USERS_PREFERENCES` WHERE `USER_ID`=?";
        $stmt = $database->prepare($query);
        $stmt->bind_param("s", $userId);
        $stmt->execute();
        $stmt->bind_result($genres);
        $stmt->fetch(); 
        
        return $genres;
    
        $stmt->close();
    }

    private static function getBooks($userId){

        require_once '../app/core/DB.php';

        $database = DB::getConnection();
     
        $query = "SELECT `BOOKS` FROM `USERS_PREFERENCES` WHERE `USER_ID`=?";
        $stmt = $database->prepare($query);
        $stmt->bind_param("s", $userId);
        $stmt->execute();
        $stmt->bind_result($books);
        $stmt->fetch(); 
        
        return $books;
    
        $stmt->close();
    }




}