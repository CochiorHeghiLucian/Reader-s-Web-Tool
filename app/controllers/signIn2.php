<?php

session_start();

class SignIn2 extends Controller{
    
    public function index($name=''){

        $this->view("signIn2/SignIn2_View");
    }   

    public function validateInput(){

        

    }
} 
?>