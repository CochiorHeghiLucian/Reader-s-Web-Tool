<?php
require_once '../app/core/DB.php';
class YourBooksModel{
    public function getBooksFromDB($userId){
        $database = DB::getConnection();
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