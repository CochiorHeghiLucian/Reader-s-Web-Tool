<?php

    class DB{

        private $host;
        private $user;
        private $password;
        private $dataBase;

        function __construct($fileName){

            if(is_file($fileName)) {
                require_once $fileName;
            }
            else{
                throw new Exception("Not a valid DB variables file!");
            }

            $this->host=$host;
            $this->user=$user;
            $this->password=$password;
            $this->dataBase=$dataBase;

            $this->connect();
        }

        private function connect(){

            /* Connecting to the DB: */

            if(!mysql_connect($this->host,$this->user,$this->password)){

                throw new Exception('Error! Could not connect to the DB...');
            }

            /* Selecting the DB: */

            if(!mysql_select_db($this->dataBase)){

                throw new Exception('Error! No database selected');
            }
        }  

        public function close(){

            mysql_close();
        }
    }
?>
