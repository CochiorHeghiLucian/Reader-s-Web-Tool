<?php
class Email{

    public static function getPassword($email){

        require_once 'DB.php';

        $database = DB::getConnection();

        $query="SELECT `PASSWORD` FROM `USERS` WHERE `EMAIL_ADDR`=?";
        $stmt=$database->prepare($query);
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $stmt->bind_result($password);
        $stmt->fetch();

        return $password;
    }
}
?>