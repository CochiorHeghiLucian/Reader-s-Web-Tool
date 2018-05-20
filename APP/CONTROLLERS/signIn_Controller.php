<?php

    /* LogIn Controller: */

   if($_POST){
       
       if(isset($_POST['submit'])){
           
         $email=$_POST['email'];
         $password=$_POST['password'];

        try{
            require_once '../MODELS/LogIn_Model.php';
            
            $logIn=new LogIn($email,$password);
        
            if(strcmp($logIn->checkEmailAndPassword(),'ValidEmailPasswordPair')==0)
            {
                header('Location:../VIEWS/PHP/PersonalInfo_View.php');
            }
            else if(strcmp($logIn->checkEmail(),'InvalidEmailAddress')==0){
                header('Location:../VIEWS/PHP/LogIn_View.php?invalidEmailAddr');
            }
            else if(strcmp($logIn->checkEmailAndPassword(),'InvalidEmailPasswordPair')==0){
                header('Location:../VIEWS/PHP/LogIn_View.php?InvalidEmailPwdPair');
            }
        }
        catch(Exception $exception){
            echo $exception->getMessage();
        }
    }
}
?>
