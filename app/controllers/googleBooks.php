<?php
require_once '/opt/lampp/htdocs/ProiectTWTEST/app/models/addBook_model.php';
require_once '/opt/lampp/htdocs/ProiectTWTEST/app/models/addBookToWishlist_model.php';

class GoogleBooks{

    public function getJsonForBook($title='', $author='', $userId, $userStatus){
        $title = str_replace(' ', '', $title);
        $author = str_replace(' ', '', $author);
        $query = $title.$author;
        // return $query;
        $url = 'https://www.googleapis.com/books/v1/volumes?q='.$query;
     
        $ch = curl_init();
        
        $header = array("Accept: application/json");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_ENCODING, "gzip");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)');   

        $respAsJson = curl_exec($ch);
        curl_close($ch);
        $respAsJson = json_decode($respAsJson);

        $title = $respAsJson->items[0]->volumeInfo->title;
        $authors = $respAsJson->items[0]->volumeInfo->authors[0];
        $noPages =  0;

        if(!array_key_exists('pageCount', $respAsJson->items[0]->volumeInfo)){
            $noPages = 0;
        }else{
            $respAsJson->items[0]->volumeInfo->pageCount;
        }


        $description = '';

        if(!isset($respAsJson->items[0]->volumeInfo->description)){
            $description = "No description found for this book";
        }else{
            $description = $respAsJson->items[0]->volumeInfo->description;
        }
        $imageLink = '';

        if(property_exists($respAsJson->items[0]->volumeInfo, 'imageLinks') && property_exists($respAsJson->items[0]->volumeInfo->imageLinks, 'thumbnail')){
            $imageLink = $respAsJson->items[0]->volumeInfo->imageLinks->thumbnail;
        }


        $resultJson = array("title" => $title, "author" => $authors, "noPages" => $noPages, "description" => $description, "imageLink" => $imageLink, "userStatus" => $userStatus, "userId" => $userId);
        
        return json_encode($resultJson);    

    }

    public function updateUserDB($json, $userId){
        
        $jsonData = json_decode($json);
        // $userId = $_SESSION['userId'];
        //$title, $author, $noPages, $description, $imageLink, ,$userStatus, $userId
        $resultReturn = AddBookModel::insertDataInDB($jsonData->title, $jsonData->author, $jsonData->noPages, $jsonData->description, $jsonData->imageLink, $jsonData->userStatus, $userId);

        return $resultReturn;
    }

    public function updateUserWishlist($json, $userId){
        
        $jsonData = json_decode($json);
       
        //$title, $author, $noPages, $description, $imageLink, ,$userStatus, $userId
        $resultReturn = AddBookToWishListModel::insertDataInDB($jsonData->title, $jsonData->author, $jsonData->noPages, $jsonData->description, $jsonData->imageLink, $jsonData->userStatus, $userId);

        return $resultReturn;
    }




}