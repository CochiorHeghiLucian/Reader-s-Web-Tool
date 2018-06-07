<?php
session_start();
require_once '../app/models/profile_model.php';

class searchList extends Controller{
    public function index(){        

        $this->view("searchPage/popUpSearch_View");
    }

    public function getBooksToDisplay(){
  
         //title, index
         $jsonData = file_get_contents('php://input');
         $jsonData = json_decode($jsonData);
         
         $index = $jsonData->index;
         $title = $jsonData->title;
 
        $_SESSION['index'] = $index;
        $_SESSION['bookTitle'] = $title;

        // $jsonBooks = json_decode($_SESSION['booksFound']);
       
        // $resultSet = array('index' => $index,'username' => $jsonBooks[$index]['username'], 'afisare' => $jsonBooks[$index]['afisare']);
        // echo json_encode($resultSet);
    }

    public function getBooksToDisplay1(){
       
        $index = $_SESSION['index'];
        $title = $_SESSION['bookTitle'];

        $jsonBooks = json_decode($_SESSION['booksFound']);

        $username = $jsonBooks[$index]->username;
        $afisare = $jsonBooks[$index]->afisare;
       
        $resultSet = array('bookTitle' => $title, 'username' =>$username, 'afisare' => $afisare);
         echo json_encode($resultSet);
    }

}