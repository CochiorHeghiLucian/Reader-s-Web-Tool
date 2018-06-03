<?php
class AddBookToWishListModel{

    public static function insertDataInDB($title, $author, $noPages, $description, $imageLink,$userStatus, $userId){
        // "title" : bookTitle,
		// "author" : bookAuthor,
		// "noPages" : noPages,
		// "description" : description,
        // "imageLink" : imageLink
        
        require_once '../app/core/DB.php';

        $database = DB::getConnection();
        //preiau id cartii din DB 
        $query = "SELECT count(*) from BOOKS_WISHLIST yb join BOOKS b on yb.book_Id = b.book_Id where yb.user_Id = ? and b.BOOK_TITLE = ? and b.BOOK_AUTHORS = ?";
        $stmt = $database->prepare($query);
        if(! $stmt->bind_param("sss", $userId, $title, $author)){
            return "eroare la bind select ";
        }
        if(!$stmt->execute()){
            return "failled DB";
        }
        
        $stmt->bind_result($duplicate);
        $stmt->fetch(); 
        $stmt->close();

        if($duplicate > 0){
            return "duplicat";
        }

        //inserez
        $query = "INSERT INTO BOOKS (BOOK_TITLE, NO_OF_PAGES, BOOK_STATUS, BOOK_AUTHORS, BOOK_IMAGE, BOOK_DESCRIPTION) VALUES(?, ?, ?, ?, ?, ?)";
        $stmt = $database->prepare($query);
        $stmt->bind_param("ssssss", $title, $noPages, $userStatus, $author, $imageLink, $description);
        if(!$stmt->execute()){
            return "eroare execute insert";
        }
    
        $stmt->fetch(); 
        $stmt->close();

        //selectez id cartii si ii asignez userului in YourBooks autoincrement->id ultimei carti inserate este id maxim
        $query = "SELECT MAX(BOOK_ID) FROM BOOKS";
        $stmt = $database->prepare($query);
        
        if(!$stmt->execute()){
            return "failled DB";
        }
        
        $stmt->bind_result($bookIdDB);
        $stmt->fetch(); 
        $stmt->close();

        //inserez in yourbooks
        $query = "INSERT INTO BOOKS_WISHLIST (USER_ID, BOOK_ID) VALUES(?, ?)";
        $stmt = $database->prepare($query);
        $stmt->bind_param("ss", $userId, $bookIdDB);
        if(!$stmt->execute()){
            return "failled DB";
        }
    
        $stmt->fetch(); 
        
        return "inserareReusita";
    
        $stmt->close();


    }
}