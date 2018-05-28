<?php
session_start();
class SignIn1 extends Controller{

    public function index($name=''){
        
        $this->view('signIn/SignIn1_View');
        
        // if(!empty($_POST['email']) && !empty($_POST['password'])){

        //      $email = $_POST['email'];
        //      $pass = $_POST['password'];

        //      if($this->validare($email, $pass) == 'valid'){
               
        //         $id = Auth::getUserIdByEmail($email);
        //         $_SESSION['userId'] = $id;

        //         header('Location:http://localhost/ProiectTWTEST/PUBLIC/profile');
        //         exit();
        //      }else if ($this->validare($email, $pass) == 'invalidEmail'){
        //         header('Location:http://localhost/ProiectTWTEST/PUBLIC/login/viewError/invalidEmail');
        //         exit();
        //      }else{
        //         header('Location:http://localhost/ProiectTWTEST/PUBLIC/login/viewError/invalidPassword');
        //         exit();
        //      }
        // }
    }

    // public function viewError($data = []){

    //     $this->view('login/LogIn_View', ['error'=>$data]);
    // }
}
?>