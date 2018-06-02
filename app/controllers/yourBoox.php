<?php
session_start();
require_once '../app/models/yourBooks_model.php';
class YourBoox extends Controller{

    public function index(){        

        $this->view("yourBoox/YourBooks_View");
    }

    public function populate(){
        //preiau cartile din baza de date
        //convertesc datele in Json
        //trimit la view
        $userId = $_SESSION['userId'];
        $resutArray = YourBooksModel::getBooksFromDB($userId);
        echo json_encode($resutArray);
       // $out = array_values($resutArray);
        //echo json_encode($resutArray);
    }
}