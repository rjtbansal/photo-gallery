<?php

class User{
    //making it static so that we dont have to instantiate it every time from outside
    public static function getAllUsers(){
        global $database;
        $result=$database->query("SELECT * from users");
        return $result;
    }

    public static function getUserById($id){
        global $database;
        $result=$database->query("SELECT * from users where id='{$id}' LIMIT 1");
        $get_user=mysqli_fetch_array($result);
        return $get_user;
    }
}

?>