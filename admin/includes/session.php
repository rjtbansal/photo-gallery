<?php

class Session{

    private $is_signed_in=false;
    public $user_id;

    function __construct(){
        session_start();
        $this -> checkLogin();
    }

    public function isSignedIn(){
        return $this->is_signed_in;
    }

    private function checkLogin(){
        if(isset($_SESSION['user_id'])){
            $this->user_id=$_SESSION['user_id'];
            $this->is_signed_in=true;
        }
        else{
            unset($this->user_id);
            $this->is_signed_in=false;
        }
    }

    public function login($user){
        if($user){
            $this->user_id=$_SESSION['user_id']=$user->id; //$user->id, the id will be coming from $user object..check User class 
            $this->is_signed_in=true;
        }
    }

    public function logout(){
        unset($_SESSION['user_id']);
        unset($this->user_id);
        $this->is_signed_in=false;
    }

}

$session=new Session();

?>