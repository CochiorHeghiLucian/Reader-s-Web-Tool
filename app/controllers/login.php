<?php
 session_start();
class Login extends Controller{

    public function index($name=''){
        require_once '../app/core/Auth.php';
        $this->view('login/LogIn_View');
        
        if(!empty($_POST['email']) && !empty($_POST['password'])){

             $email = $_POST['email'];
             $pass = $_POST['password'];

             if($this->validare($email, $pass) == 'valid'){
               
                $id = Auth::getUserIdByEmail($email);
                $_SESSION['userId'] = $id;

                header('Location:http://localhost/ProiectTWTEST/PUBLIC/profile');
                exit();
             }else if ($this->validare($email, $pass) == 'invalidEmail'){
                header('Location:http://localhost/ProiectTWTEST/PUBLIC/login/viewError/invalidEmail');
                exit();
             }else{
                header('Location:http://localhost/ProiectTWTEST/PUBLIC/login/viewError/invalidPassword');
                exit();
             }
        }
    }

    private function validare($email, $pass){

        require_once '../app/core/Auth.php';

        if(Auth::validateUser($email, $pass) == "valid"){
            return 'valid';
         }else if(Auth::validateUser($email, $pass) == "invalidEmail"){
             return "invalidEmail";
         }else{
             return "invalidPassword";
         }
    }

    public function viewError($data = []){

        $this->view('login/LogIn_View', ['error'=>$data]);
    }
}
?>