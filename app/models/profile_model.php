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

    public static function getSearchBooksFor($title){
        require_once '../app/core/DB.php';
        $database = DB::getConnection();
        //preiau id cartii din DB 
        $query = "SELECT BOOK_TITLE, BOOK_AUTHORS, BOOK_IMAGE, BOOK_DESCRIPTION 
        from YOUR_BOOKS yb join BOOKS b on yb.book_Id = b.book_Id WHERE BOOK_TITLE=?"; //and yb.bookId != userId
        $stmt = $database->prepare($query);
        if(! $stmt->bind_param("s", $title)){
            return "eroare la bind select ";
        }
        if(!$stmt->execute()){
            return "failled DB";
        }

        $stmt->store_result();

        $stmt->bind_result($titlu, $author, $image, $description);
        
        $resultArray = array();
        while($stmt->fetch()){
            $line = array("title" => $titlu, "author" => $author, "image" => $image, "description" => $description);
            $resultArray[] = $line;
          
        }
        $stmt->free_result();

        $stmt->close();

        return $resultArray;
        
        
        
       
    }




}