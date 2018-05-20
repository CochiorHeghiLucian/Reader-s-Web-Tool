<?php

    class LogIn{

        private $email;
        private $password;
        private $DB;

        public function __construct($email,$password){

            /* Setting the LogIn variables: */

            $this->setData($email,$password);
            
            /* Connecting to the DB: */

            $this->connectToDB();
        }
        
        public function setData($email,$password){

            $this->email=$email;
            $this->password=$password;
        }

        public function connectToDB(){

            require_once '../MODELS/DB_Model.php';
            $vars='../variables.php';
            
            $this->DB=new DB($vars);
        }

        public function checkEmailAndPassword(){

            $emailPasswordPair="SELECT * FROM `USERS` WHERE `EMAIL_ADDR`='$this->email' AND `PASSWORD`='$this->password'";
            $emailPasswordPairSQL=mysql_query($emailPasswordPair);
            
            if(mysql_num_rows($emailPasswordPairSQL)==1){
                return 'ValidEmailPasswordPair';
            }
            else{
                return 'InvalidEmailPasswordPair';
            }
        }

        public function checkEmail(){

            $checkEmailAddress="SELECT * FROM `USERS` WHERE `EMAIL_ADDR`='$this->email'";
            $checkEmailAddressSQL=mysql_query($checkEmailAddress);

            if(mysql_num_rows($checkEmailAddressSQL)==0){
                return 'InvalidEmailAddress';
            }
            else{
                return 'ValidEmailAddress';
            }
        }

        public function recoverPassword($emailAddress){

            $query="SELECT `PASSWORD` FROM `USERS` WHERE `EMAIL_ADDR`='$emailAddress'";
            
            $sql=mysql_query($query);

            if(mysql_num_rows($sql)==1)
            {
                return mysql_result($sql, 0);
            }
            else{
                return FALSE;
            }
        }

        public function close(){
            $this->DB->close();
        }
    }
?>
