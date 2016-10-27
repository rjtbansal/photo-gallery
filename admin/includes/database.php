<?php
require_once('newconfig.php');

    class Database{

        public $connection;

        function __construct(){
            $this -> openDbConnection();
        }

        public function openDbConnection(){
            $this->connection=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
            if(! $this->connection){
                die('Connection to db failed '.mysqli_error($this->connection));
            }
        }

        public function query($query){
            $result=mysqli_query($this->connection,$query);
           
            return $result;
        }

        private function confirmQuery($result){
             if(!$result){
                die('Unable to query');
             }
        }

        public function escapeString($string){
            $escaped_string=mysqli_real_escape_string($this->connection, $string);
            return $escaped_string;
        }
     
    }

    $database=new Database();
    
?>