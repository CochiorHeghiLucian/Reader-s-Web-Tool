<?php
session_start();
require_once '../app/models/addBook_model.php';
class AddBook extends Controller{

    public function index(){
        $this->view("addBook/addToWishList_View");

        // "title" : bookTitle,
		// "author" : bookAuthor,
		// "noPages" : noPages,
		// "description" : description,
		// "imageLink" : imageLink,
		// "userStatus" : userStatus
    }

    public function updateUserDB(){
        $jsonData = file_get_contents('php://input');
        $jsonData = json_decode($jsonData);
        $userId = $_SESSION['userId'];
        //$title, $author, $noPages, $description, $imageLink, ,$userStatus, $userId
        $resultReturn = AddBookModel::insertDataInDB($jsonData->title, $jsonData->author, $jsonData->noPages, $jsonData->description, $jsonData->imageLink, $jsonData->userStatus, $userId);

        echo $resultReturn;
    }

}