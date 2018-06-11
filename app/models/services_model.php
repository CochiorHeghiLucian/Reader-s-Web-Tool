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

        $stmt->close();

        return array_values($resultArray);
        
        
        
        
    }


    public static function getStatistics(){
        $database = DB::getConnection();

        $query = "SELECT USER_NAME, NO_OF_EXCHANGE FROM `USERS` ORDER BY 2 DESC";
        $stmt = $database->prepare($query);
       
        if(!$stmt->execute()){
            return "failled DB";
        }

        $stmt->store_result();

        $stmt->bind_result($userName, $noOfExchanges);
        
        $resultArray = array();
        while($stmt->fetch()){
            $line = array("userName" => $userName, "noOfExchanges" => $noOfExchanges);
            $resultArray[] = $line;
          
        }
        $stmt->free_result();

        $stmt->close();


        ///////
        $query = "SELECT BOOK_NAME, NUMBER_OF_EXCHANGES FROM `BOOKS_STATISTICS` ORDER BY 2 DESC;";
        $stmt = $database->prepare($query);
       
        if(!$stmt->execute()){
            return "failled DB";
        }

        $stmt->store_result();

        $stmt->bind_result($booksName, $noOfExchanges);
        
        $resultArray2 = array();
        while($stmt->fetch()){
            $line = array("bookName" => $booksName, "noOfExchanges" => $noOfExchanges);
            $resultArray2[] = $line;
          
        }
        $stmt->free_result();

        $stmt->close();

        $result = array(["activeUserStatistics" => $resultArray], ["booksExchange" => $resultArray2]);
        

        return array_values($result);
        
        
        
        

    }


}