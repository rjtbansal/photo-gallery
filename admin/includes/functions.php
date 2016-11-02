<?php
//autoload allows classes to be included automatically without having us to include them in each and every script

    function classAutoLoader($class){
        $class=strtolower($class);
        $path="includes/{$class}.php";
        if(is_file($path) && !class_exists($class)){
            require_once($path);
        }
        else{
            die("File {$class}.php could not be found");
        }
    }

    spl_autoload_register("classAutoLoader");
?>