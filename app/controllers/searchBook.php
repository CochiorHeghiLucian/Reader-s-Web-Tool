<?php
session_start();
require_once '../app/models/profile_model.php';

class searchBook extends Controller{
    public function index(){        

        $this->view("searchPage/SearchPage_View");
    }

    public function getBooksToDisplay(){
        echo $_SESSION['booksFound'];
    }

}