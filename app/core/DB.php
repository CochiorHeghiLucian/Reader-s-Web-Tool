<?php

class DB{
    private static $dataBase;

    public static function getConnection(){
        
        if(self::$dataBase == null){
            $dataBase = new mysqli('localhost','root','','BooX');
        }

        mysqli_set_charset($dataBase, 'utf8');

        return $dataBase;
    }
}
?>