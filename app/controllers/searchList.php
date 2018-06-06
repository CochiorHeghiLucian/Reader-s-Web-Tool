<?php
session_start();
require_once '../app/models/profile_model.php';

class searchList extends Controller{
    public function index(){        

        $this->view("searchPage/popUpSearch_View");
    }

    public function getBooksToDisplay(){
  
        $index = file_get_contents('php://input');
        $_SESSION['index'] = $index;

        // $jsonBooks = json_decode($_SESSION['booksFound']);
       
        // $resultSet = array('index' => $index,'username' => $jsonBooks[$index]['username'], 'afisare' => $jsonBooks[$index]['afisare']);
        // echo json_encode($resultSet);
    }

    public function getBooksToDisplay1(){
        $index = $_SESSION['index'];

        $jsonBooks = json_decode($_SESSION['booksFound']);

        $username = $jsonBooks[$index]->username;
        $afisare = $jsonBooks[$index]->afisare;
       
        $resultSet = array('username' =>$username, 'afisare' => $afisare);
         echo json_encode($resultSet);
    }

}