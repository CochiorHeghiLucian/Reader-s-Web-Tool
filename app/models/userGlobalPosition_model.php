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
       // $stmt->fetch(); 
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

        if($counter==0){
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

        $query = "SELECT `LATITUDE`, `LONGITUDE`, `EMAIL_ADDR`, `PHONE_NUMBER` FROM `USERS_OBSERVERS` uo JOIN `USERS` u ON uo.USER_ID=u.USER_ID WHERE u.USER_ID= ?";

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

    ///////////////////////////////////////////
    public static function cartiIncomun($userId2, $userId1){
        
        $database = DB::getConnection();

        //preiau id cartii din DB 
        $user1Books = self::userWhishlistBooks($userId1, $database);
        $user2Books = self::userHisBooks($userId2, $database);

        $resultArray = self::intersection($user1Books, $user2Books);

        if(count($resultArray) == 0){
            return false;
        }else{
            return true;
        }

        
        
        
        
       
    }

    private function intersection($array1, $array2){
        $resultArray = array();
        for($i = 0; $i<count($array1); $i++){
            for($j=0; $j<count($array2); $j++){
                if($array1[$i]["title"] == $array2[$j]["title"] ){
                    $resultArray[] = $array1[$i];
                }
            }
        }

        return $resultArray;

    }

    //returneaza wishlistBooks dupa un userName 
    private function userWhishlistBooks($userId, $database){
        //select userId by username;

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
?>

