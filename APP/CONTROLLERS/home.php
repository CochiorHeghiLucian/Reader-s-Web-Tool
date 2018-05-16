<?php
    class Home extends Controller{

        public function index($name=''){

           $user=$this->model('User');
           $user->name=$name;
           
           $this->view('HOME/index',['name'=>$user->name]);
        }
    }
?>