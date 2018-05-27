<?php
class Login extends Controller{

    public function index($name=''){

        $this->view('login/LogIn_View');
        
        if(!empty($_POST['email']) && !empty($_POST['password'])){

             $email = $_POST['email'];
             $pass = $_POST['password'];

             if($this->validare($email, $pass)){

                header('Location:http://localhost/ProiectTWTEST/PUBLIC/profile');
                exit();
             } 
             else{
                header('Location:http://localhost/ProiectTWTEST/PUBLIC/login/viewError/invalidEmail');
                exit();
             }
        }
    }

    private function validare($email, $pass){

        require_once '../app/core/Auth.php';

        if(Auth::validateUser($email, $pass) == "valid"){
            return true;
         }else{
             return false;
         }
    }

    public function viewError($data = []){

        $this->view('login/LogIn_View', ['error'=>$data]);
    }
}
?>