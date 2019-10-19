<?php
    include_once 'config.php';

        class DB {
            private $host = DB_HOST;
            private $user = DB_USER;
            private $pass = DB_PASS;
            private $dbname = DB_NAME;
        
            public $table = 'tbook';
            
            public $link;

            public function __construct()
            {
                   $this->connectDatabase();
            }

            public function connectDatabase(){
                $this->link = new mysqli($this->host,$this->user,$this->pass,$this->dbname); 
                if(!$this->link){
                    echo 'Connect Faild !!';
                }
                mysqli_set_charset($this->link,"utf8");
            }

            public function insert($query){
                $insert = $this->link->query($query);
                if($insert){
                    return $insert;
                }else{
                    return false;
                }
            }

            public function select($query){
                $select = $this->link->query($query);
                if($select->num_rows > 0){
                    return $select;
                }else{
                    return false;
                }
            }

            public function viewData($table){

                $sql = "SELECT * FROM $table";
                $query = $this->select($sql);
                return $query;
            }
        
        }

?>