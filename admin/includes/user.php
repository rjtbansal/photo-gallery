<?php

class User{

    public $id; //we use this in session class in login method 
    public $username;
    public $password;
    public $firstname;
    public $lastname;

    //making it static so that we dont have to instantiate it every time from outside
    public static function getAllUsers(){      
        return self::execute_query("SELECT * from users");
    }

    public static function getUserById($id){
        $result_arr=self::execute_query("SELECT * from users where id='{$id}' LIMIT 1");
        return !empty($result_arr) ? array_shift($result_arr) : false;     
    }

    public static function execute_query($query){
        global $database;
        $result=$database->query($query);
        $obj_array=Array(); //will store array of objects
        while ($row=mysqli_fetch_array($result)) {
            $obj_array[]=self::instantiate_object($row); //$result contains results as database table..we loop through each object
        }
        return $obj_array;
    }

    public static function instantiate_object($result_obj){
        $obj=new self; //initializing an obj to this class itself
        // $obj->id= $get_user_by_id['id'];
        // $obj->username=$get_user_by_id['username'];
        // $obj->firstname=$get_user_by_id['firstname'];
        // $obj->lastname=$get_user_by_id['lastname'];

        foreach ($result_obj as $the_attribute => $value) {
            if($obj->hasAttribute($the_attribute)){
                $obj->$the_attribute=$value;
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