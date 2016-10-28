<?php
require_once('newconfig.php');

    class Database{

        public $connection;

        function __construct(){
            $this -> openDbConnection();
        }

        public function openDbConnection(){
            //$this->connection=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME); //procedural way

            //OOP way of connecting to mysql_affected_rows
            $this->connection=new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

            // if(! $this->connection){ //procedural way
            //     die('Connection to db failed '.mysqli_error($this->connection));
            // }

            //OOP WAY
            if($this->connection->connect_errno){
                die('Connection failed '. $this->connection->connect_error);
            }
        }

        public function query($query){
           // $result=mysqli_query($this->connection,$query);
           $result=$this->connection->query($query);
           $this->confirmQuery($result);
            return $result;
        }

        private function confirmQuery($result){
             if(!$result){
                die('Unable to query '.$this->connection->error);
             }
        }

        public function escapeString($string){
           // $escaped_string=mysqli_real_escape_string($this->connection, $string);
           $escaped_string=$this->connection->real_escape_string($string);
            return $escaped_string;
        }

        public function insertId(){
            return $this->connection->insert_id;
        }
     
    }

    $database=new Database();
    
?>