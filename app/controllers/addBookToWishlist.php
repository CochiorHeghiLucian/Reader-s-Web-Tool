<?php
session_start();
require_once '../app/models/addBookToWishlist_model.php';
class AddBookToWishlist extends Controller{
    public function index(){        

        $this->view("addBookToWishlist/addToWishList_View");
    }
    
    public function updateUserDB(){
        $jsonData = file_get_contents('php://input');
        $jsonData = json_decode($jsonData);
        $userId = $_SESSION['userId'];
        //$title, $author, $noPages, $description, $imageLink, ,$userStatus, $userId
        $resultReturn = AddBookToWishListModel::insertDataInDB($jsonData->title, $jsonData->author, $jsonData->noPages, $jsonData->description, $jsonData->imageLink, $jsonData->userStatus, $userId);

        echo $resultReturn;
    }
}