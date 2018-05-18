<?php

    class LogIn{

        private $username;
        private $password;
        private $cxn;

        function __construct($username,$password){

            /* Setting the username and password for the LogIn: */

            $this->setData($username,$password);
            
            /* Connecting to the DB: */

            $this->connectToDB();
        }
        
        public function setData($username,$password){

            $this->username=$username;
            $this->password=$password;
        }

        public function connectToDB(){

            require_once '../MODELS/DB_Model.php';
            $vars='../variables.php';
            
            $this->cxn=new DB($vars);
        }

        public function getData(){

            $query="SELECT * FROM `USERS` WHERE `USER_NAME`='$this->username' AND `PASSWORD`='$this->password'";
            
            $sql=mysql_query($query);
            
            if(mysql_num_rows($sql)==1){
                return TRUE;
            }
            else{
                throw new Exception("username or password is invalid. Please try again.");
            }
        }

        public function close(){
            $this->cxn->close();
        }
    }
?>
