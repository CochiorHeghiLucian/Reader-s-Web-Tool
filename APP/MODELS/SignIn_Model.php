<?php

    class SignIn{

        private $firstName;
        private $lastName;
        private $nickName;

        private $male;
        private $female;

        private $dateOfBirth;
        private $phoneNumber;
        private $email;
        private $emailConfirmation;
        private $password;
        private $passwordConfirmation;
        private $street;
        private $apartment;
        private $country;
        private $city;
        private $ZIP;
        private $profilePicture;
        private $wallpaperPicture;

        public function __construct(){

            /* Setting the SignIn variables: */
            
            if(is_array($data)){
                
                $this->setData($data);
            }
            else{
                throw new Exception('Error: Data must be in an array.');
            }
        }

        public function setData($data){

            $this->firstName=$data['firstName'];
            $this->lastName=$data['lastName'];
            $this->nickName=$data['nickName'];
            $this->male=$data['male'];
            $this->female=$data['female'];
            $this->phoneNumber=$data['phoneNo'];
            $this->email=$data['email'];
            $this->emailConfirmation=$data['retypeEmail'];
            $this->password=$data['password'];
            $this->passwordConfirmation=$data['retypePassword'];
            $this->street=$data['street'];
            $this->apartment=$data['apartment'];
            $this->country=$data['country'];
            $this->city=$data['city'];
            $this->ZIP=$data['ZIP'];
            $this->profilePicture=$data['profilePic'];
            $this->wallpaperPicture=$data['wallpaperPic'];
        }
    }
?>
