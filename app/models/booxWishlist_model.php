<?php
require_once '../app/core/DB.php';
class BooxWishlistModel{
    
    public static function getBooksFromDB($userId){
        $database = DB::getConnection();
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

    public static function deleteBookFromDB($userId, $title){
        $database = DB::getConnection();
        //preiau id cartii din DB 
        $query = "SELECT YB.BOOK_ID FROM BOOKS B JOIN BOOKS_WISHLIST YB ON B.BOOK_ID = YB.BOOK_ID WHERE YB.USER_ID = ? AND B.BOOK_TITLE = ?";
        $stmt = $database->prepare($query);
    

        if(! $stmt->bind_param("ss", $userId, $title)){
            return "eroare la bind select ";
        }
        if(!$stmt->execute()){
            return "failled DB";
        }
        
        $stmt->bind_result($bookId); 
        $stmt->fetch();  
    
        $stmt->close();

        $query = "DELETE FROM BOOKS WHERE BOOK_ID = ?";
        $stmt = $database->prepare($query);
        if(! $stmt->bind_param("i", $bookId)){
            return "eroare la bind select ";
        }
        if(!$stmt->execute()){
            return "failled DB";
        } 

      
        $stmt->close();


        


        $query = "DELETE FROM BOOKS_WISHLIST WHERE BOOK_ID = ?";
        $stmt = $database->prepare($query);
        if(! $stmt->bind_param("s", $bookId)){
            return "eroare la bind select ";
        }
        if(!$stmt->execute()){
            return "failled DB";
        }

        $stmt->fetch(); 
        $stmt->close();

        return $bookId;
       
        
    }

}