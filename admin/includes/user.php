<?php

class User{

    public $id;
    public $username;
    public $password;
    public $firstname;
    public $lastname;

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

    public static function instantiate_object($get_user_by_id){
        $obj=new self; //initializing an obj to this class itself
        // $obj->id= $get_user_by_id['id'];
        // $obj->username=$get_user_by_id['username'];
        // $obj->firstname=$get_user_by_id['firstname'];
        // $obj->lastname=$get_user_by_id['lastname'];

        foreach ($get_user_by_id as $the_attribute => $value) {
            if($obj->hasAttribute($the_attribute)){
                $obj->the_attribute=$value;
            }
        }

        return $obj;
    }

    private function hasAttribute($the_attribute){

        $object_properties= get_object_vars($this); //getting properties of current class (User) so using $this

        return array_key_exists($the_attribute, $object_properties); 
    }
}

?>