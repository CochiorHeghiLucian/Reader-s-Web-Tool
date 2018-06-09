<?php
require_once '/opt/lampp/htdocs/ProiectTWTEST/app/core/DB.php';

class ServicesModel{
    public static function getAllBooks(){
        $database = DB::getConnection();
        //preiau id cartii din DB 
        $query = "SELECT u.USER_NAME, b.BOOK_TITLE, b.BOOK_AUTHORS, b.BOOK_IMAGE, b.BOOK_DESCRIPTION 
        from BOOKS b JOIN YOUR_BOOKS yb ON b.book_id = yb.book_id JOIN USERS u ON u.user_id = yb.user_id";
        $stmt = $database->prepare($query);
       
        if(!$stmt->execute()){
            return "failled DB";
        }

        $stmt->store_result();

        $stmt->bind_result($userName ,$titlu, $author, $image, $description);
        
        $resultArray = array();
        while($stmt->fetch()){
            $line = array("UserName" => $userName, "title" => $titlu, "author" => $author, "image" => $image, "description" => $description);
            $resultArray[] = $line;
          
        }
        $stmt->free_result();

        

        return array_values($resultArray);
        
        
        
        $stmt->close();
    }



}