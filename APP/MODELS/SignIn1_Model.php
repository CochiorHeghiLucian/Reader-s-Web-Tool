<?php

    class SignIn1{

        private $favoriteAuthors;
        private $favoriteGenres;
        private $favoriteBooks;
        private $favoriteQuote;
        private $DB;

        public function __construct(){

            /* Setting the SignIn1 variables: */
            
            if(is_array($data)){

                $this->setData($data);
            }
            else{
                throw new Exception('Error: Data must be in an array.');
            }

            /* Connecting to the DB: */

            $this->connectToDB();
        }

        public function setData($data){

            $this->favoriteAuthors=$data['authors'];
            $this->favoriteGenres=$data['genres'];
            $this->favoriteBooks=$data['books'];
            $this->favoriteQuote=$data['quote'];
        }

        public function connectToDB(){

            require_once '../MODELS/DB_Model.php';
            $vars='../variables.php';
            
            $this->DB=new DB($vars);
        }
    }
?>
