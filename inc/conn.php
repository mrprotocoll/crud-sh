<?php
session_start();
class Db{
    private static $host = "localhost";
    private static $user = "root";
    private static $pass = "";
    private static $db = "crud";

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