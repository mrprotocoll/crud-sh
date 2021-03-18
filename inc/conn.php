<?php
session_start();
class Db{
    private static $host = "us-cdbr-east-03.cleardb.com";
    private static $user = "b137daf3fe916b";
    private static $pass = "d4663f22";
    private static $db = "heroku_05e6751c2b1cef6";

    public static function conn(){
        try{
            $conn = new mysqli(self::$host,self::$user,self::$pass,self::$db);
            return $conn;
        } 
        catch (Exception $ex) {
            $error = $ex->getMessage().$conn->connect_error;
            echo $error;exit;
        }
    }
}
