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

    public static function getSearchBooksFor($title, $userId1){
        require_once '../app/core/DB.php';
        $database = DB::getConnection();

        //preiau id cartii din DB 
        $query = "SELECT yb.USER_ID, BOOK_TITLE, BOOK_AUTHORS, BOOK_IMAGE, BOOK_DESCRIPTION 
        from YOUR_BOOKS yb join BOOKS b on yb.book_Id = b.book_Id WHERE BOOK_TITLE=? AND yb.USER_ID != ?" ; //and yb.bookId != userId
        $stmt = $database->prepare($query);
        if(! $stmt->bind_param("ss", $title, $userId1)){
            return "eroare la bind select ";
        }
        if(!$stmt->execute()){
            return "failled DB";
        }

        $stmt->store_result();

        $stmt->bind_result($userId, $titlu, $author, $image, $description);
        
        $resultArray = array();
        while($stmt->fetch()){
            //selectez username-ul
            $query2 = "SELECT USER_NAME FROM USERS WHERE USER_ID = ?";
            $stmt2 = $database->prepare($query2);
            $stmt2->bind_param("s", $userId);
            $stmt2->execute();
            $stmt2->bind_result($userName);
            $stmt2->fetch();
            $stmt2->close();

            $userWhishlistBooks = self::userWhishlistBooks($userName, $database);
            $userHisBooks = self::userHisBooks($userId1, $database);

           // return $userWhishlistBooks;

            $intersecrion = self::intersection($userHisBooks, $userWhishlistBooks);
           

            $line = array("username"=>$userName, "title" => $titlu, "author" => $author, "image" => $image, "description" => $description, "afisare" => $intersecrion);
            $resultArray[] = $line;
          
        }
        $stmt->free_result();

        $stmt->close();

        return $resultArray;
        
        
        
       
    }

    //face intersectia a 2 vectori de carti analizand titlul si autorii (cartile mele - cartile dorite de el)
    //return alt vector
    private function intersection($array1, $array2){
        $resultArray = array();
        for($i = 0; $i<count($array1); $i++){
            for($j=0; $j<count($array2); $j++){
                if($array1[$i]["title"] == $array2[$j]["title"] ){
                    $resultArray[] = $array1[$i];
                }
            }
        }
        $nrElemente = count($resultArray);

        if($nrElemente == 0){
            for($j=0; $j<count($array2); $j++){
                $resultArray[] = $array2[$j];
            }
        }else{

             for($i = 0; $i< $nrElemente; $i++){
                 for($j=0; $j<count($array2); $j++){
                      if($resultArray[$i]["title"] != $array2[$j]["title"] ){
                           $resultArray[] = $array2[$j];
                      }

                 }
                }
            }


     

        return $resultArray;

    }

    //returneaza wishlistBooks dupa un userName 
    private function userWhishlistBooks($username, $database){
        //select userId by username;
        $query2 = "SELECT USER_ID FROM USERS WHERE USER_NAME = ?";
        $stmt2 = $database->prepare($query2);
        $stmt2->bind_param("s", $username);
        $stmt2->execute();
        $stmt2->bind_result($userId);
        $stmt2->fetch();
        $stmt2->close();

         //preiau id cartii din DB 
         $query = "SELECT BOOK_TITLE, BOOK_AUTHORS, BOOK_IMAGE, BOOK_DESCRIPTION 
         from BOOKS_WISHLIST yb join BOOKS b on yb.book_Id = b.book_Id
         where yb.user_Id = ?";
         $stmt = $database->prepare($query);
         if(! $stmt->bind_param("s", $userId)){
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
 
         
 
         return array_values($resultArray);
         
         
         
         $stmt->close();
    }


    //returneaza cartile pentru schimb dupa un id
    private function userHisBooks($userId, $database){
        
         //preiau id cartii din DB 
         $query = "SELECT BOOK_TITLE, BOOK_AUTHORS, BOOK_IMAGE, BOOK_DESCRIPTION 
         from YOUR_BOOKS yb join BOOKS b on yb.book_Id = b.book_Id
         where yb.user_Id = ?";
         $stmt = $database->prepare($query);
         if(! $stmt->bind_param("s", $userId)){
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
 
         
 
         return array_values($resultArray);
         
         
         
         $stmt->close();
    }




}