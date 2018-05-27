<?php
class DB{
    private static $dataBase;

    public static function getConnection(){
        if(self::$dataBase == null){
            $dataBase = new mysqli('localhost','root','','BooX');
        }
        return $dataBase;
    }
}