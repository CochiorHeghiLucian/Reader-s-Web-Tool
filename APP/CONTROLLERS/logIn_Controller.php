<?php

    /* LogIn Controller: */

   if($_POST){
       
       if(isset($_POST['submit'])){
           
         $username=$_POST['username'];
         $password=$_POST['password'];

        try{
            require_once '../MODELS/LogIn_Model.php';
            
            $logIn=new LogIn($username,$password);
        
            if($logIn->getData()==TRUE)
            {
                session_start();
                $_SESSION['username']=$username;
                header('Location:../VIEWS/PHP/PersonalInfo_View.php');
            }
        }
        catch(Exception $exception){
            echo $exception->getMessage();
        }
    }
}
?>
