<?php
class SignIn{

    public static function insertIntoUsers_Preferences($userId, $authors, $genres, $books, $quote){

        $database = DB::getConnection();

                //inserez
                $query = "INSERT INTO USERS_PREFERENCES (USER_ID, AUTHORS, GENRES, BOOKS, QUOTE) VALUES(?, ?, ?, ?, ?)";
                $stmt = $database->prepare($query);
                $stmt->bind_param("sssss", $userId, $authors, $genres, $books, $quote);
                $stmt->fetch(); 
                $stmt->close();
    }
}
?>