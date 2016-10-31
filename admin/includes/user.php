<?php

class User{
    //making it static so that we dont have to instantiate it every time from outside
    public static function getAllUsers(){      
        return self::execute_query("SELECT * from users");
    }

    public static function getUserById($id){
        $result=self::execute_query("SELECT * from users where id='{$id}' LIMIT 1");
        $get_user=mysqli_fetch_array($result);
        return $get_user;
    }

    public static function execute_query($query){
        global $database;
        $result=$database->query($query);
        return $result;
    }
}

?>