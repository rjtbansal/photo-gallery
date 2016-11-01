<?php
//autoload allows classes to be included automatically without having us to include them in each and every script

    function __autoload($class){
        $class=strtolower($class);
        $path="includes/{$class}.php";
        if(file_exists($path)){
            require_once($path);
        }
        else{
            die("File {$class}.php could not be found");
        }
    }
?>