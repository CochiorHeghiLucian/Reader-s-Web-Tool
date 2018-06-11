<?php

//require_once '~/../app/models/yourBooks_model.php';
require_once '/opt/lampp/htdocs/ProiectTWTEST/app/models/yourBooks_model.php';
require_once '/opt/lampp/htdocs/ProiectTWTEST/app/models/booxWishlist_model.php';
require_once '/opt/lampp/htdocs/ProiectTWTEST/app/models/services_model.php';
require_once '/opt/lampp/htdocs/ProiectTWTEST/app/models/auth_model.php';
require_once '/opt/lampp/htdocs/ProiectTWTEST/app/core/DB.php';
require_once '/opt/lampp/htdocs/ProiectTWTEST/app/models/profile_model.php';
require_once '/opt/lampp/htdocs/ProiectTWTEST/app/controllers/googleBooks.php';

switch ($_SERVER['REQUEST_METHOD']) {
    case "GET":
        if(preg_match('/\/v1\/bookmarks\/?$/' , $_SERVER['REQUEST_URI'])) {
            $resutArray = ServicesModel::getAllBooks();
           echo json_encode($resutArray);
           http_response_code(200);

           
        }if(preg_match('/\/v1\/bookmarks\/statistic\/?$/', $_SERVER['REQUEST_URI'], $matches)) {
            $resutArray = ServicesModel::getStatistics();
           echo json_encode($resutArray);
           http_response_code(200);

           
        } else if(preg_match('/\/v1\/bookmarks\/userBooks\/(.+)?$/', $_SERVER['REQUEST_URI'], $matches) ) {    
            // cartile de la yourBook pentru un user identificat prin userName
            $userId = YourBooksModel::getIdByUserName($matches[1]);
            $resutArray = YourBooksModel::getBooksFromDB($userId);

            if(!empty($resutArray)){
                echo json_encode($resutArray);
                //matches[1]= (.+)
                http_response_code(200);
            }else{
                echo json_encode($resutArray);
                //matches[1]= (.+)
                http_response_code(404);
            }

        }else if(preg_match('/\/v1\/bookmarks\/userWishlistBooks\/(.+)?$/', $_SERVER['REQUEST_URI'], $matches)){
                $userId = YourBooksModel::getIdByUserName($matches[1]);
                $resutArray = BooxWishlistModel::getBooksFromDB($userId);
                
                if(!empty($resutArray)){
                    echo json_encode($resutArray);
                    //matches[1]= (.+)
                    http_response_code(200);
                }else{
                    echo json_encode($resutArray);
                    //matches[1]= (.+)
                    http_response_code(404);
                }
        } else {
            http_response_code(404);
        }
        break;

    case "POST":
        //primesc nume utilizator o parola si trebuie sa adaug carti la wishlist/yourbooks
        
        $json_str = file_get_contents('php://input');
    
        $json_obj = json_decode($json_str);    

        if(preg_match('/\/v1\/bookmarks\/?$/' , $_SERVER['REQUEST_URI'], $matches)) 
        {
            //fac search din perspectiva unui user email si parola;
            $userEmail = $json_obj->useremail;
            $userPassword = $json_obj->password;
            $userSearch = $json_obj->bookSearch;

            if(AUTH::validateUser($userEmail, $userPassword) == "valid"){
                $userId = YourBooksModel::getIdByEmail($userEmail);
               // echo $userEmail." ".$userPassword." ".$userSearch. " ". $userId;
                $resultSearchBook = ProfileModel::getSearchBooksFor($userSearch, $userId);

                echo json_encode($resultSearchBook);
                http_response_code(200);
            }else{
                echo json_encode([]);
                http_response_code(404);
            }
            // echo json_encode(DataBase::addBookmark($json_obj->nume, $json_obj->url));
            // http_response_code(200);
        }if(preg_match('/\/v1\/bookmarks\/addYourBooks\/?$/' , $_SERVER['REQUEST_URI'], $matches)){
            //GoogleBooks::getJsonForBook(title, author)
            $userEmail = $json_obj->useremail;
            $userPassword = $json_obj->password;

            if(AUTH::validateUser($userEmail, $userPassword) == "valid"){
                $userSearch = $json_obj->bookSearch;
                $userAuthor = $json_obj->bookAuthor;
                $userDescription = $json_obj->bookDescription;
                $userId = YourBooksModel::getIdByEmail($userEmail);
               // echo $userEmail." ".$userPassword." ".$userSearch. " ". $userId;
                $resultSearchBook = GoogleBooks::getJsonForBook($userSearch, $userAuthor, $userId, $userDescription);
                $resultAdd = GoogleBooks::updateUserDB($resultSearchBook, $userId);

                echo $resultAdd;
                http_response_code(200);
            }else{
                echo json_encode([]);
                http_response_code(404);
            }

        } if(preg_match('/\/v1\/bookmarks\/addWishlist\/?$/' , $_SERVER['REQUEST_URI'], $matches)){
            //GoogleBooks::getJsonForBook(title, author)
            $userEmail = $json_obj->useremail;
            $userPassword = $json_obj->password;

            if(AUTH::validateUser($userEmail, $userPassword) == "valid"){
                $userSearch = $json_obj->bookSearch;
                $userAuthor = $json_obj->bookAuthor;
                $userDescription = $json_obj->bookDescription;
                $userId = YourBooksModel::getIdByEmail($userEmail);
               // echo $userEmail." ".$userPassword." ".$userSearch. " ". $userId;
                $resultSearchBook = GoogleBooks::getJsonForBook($userSearch, $userAuthor, $userId, $userDescription);
                $resultAdd = GoogleBooks::updateUserWishlist($resultSearchBook, $userId);

                echo $resultAdd;
                http_response_code(200);
            }else{
                echo json_encode([]);
                http_response_code(404);
            }

        } if(preg_match('/\/v1\/bookmarks\/deleteYourBooks\/?$/' , $_SERVER['REQUEST_URI'], $matches)){
            //GoogleBooks::getJsonForBook(title, author)
            $userEmail = $json_obj->useremail;
            $userPassword = $json_obj->password;

            if(AUTH::validateUser($userEmail, $userPassword) == "valid"){
                $userSearch = $json_obj->bookSearch;
                $userId = YourBooksModel::getIdByEmail($userEmail);
               // echo $userEmail." ".$userPassword." ".$userSearch. " ". $userId;
               $resultDelete = YourBooksModel::deleteBookFromDB($userId, $userSearch);
                if(isset($resultDelete)){
                    echo "stergere reusita";
                }else{
                    echo "stergere esuata";
                }

                
                http_response_code(200);
            }else{
                echo json_encode([]);
                http_response_code(404);
            }

        } if(preg_match('/\/v1\/bookmarks\/deleteBooksWishlist\/?$/' , $_SERVER['REQUEST_URI'], $matches)){
            //GoogleBooks::getJsonForBook(title, author)
            $userEmail = $json_obj->useremail;
            $userPassword = $json_obj->password;

            if(AUTH::validateUser($userEmail, $userPassword) == "valid"){
                $userSearch = $json_obj->bookSearch;
                $userId = YourBooksModel::getIdByEmail($userEmail);
               // echo $userEmail." ".$userPassword." ".$userSearch. " ". $userId;
               $resultDelete = BooxWishlistModel::deleteBookFromDB($userId, $userSearch);
                if(isset($resultDelete)){
                    echo "stergere reusita";
                }else{
                    echo "stergere esuata";
                }

                
                http_response_code(200);
            }else{
                echo json_encode([]);
                http_response_code(404);
            }

        }else {
            http_response_code(404);
        }
        break;

    case "PUT":
        $json_str = file_get_contents('php://input');
        $json_obj = json_decode($json_str); 

        if(preg_match('/\/v1\/bookmarks\/addYourBooks\/?$/' , $_SERVER['REQUEST_URI'], $matches)){
            //GoogleBooks::getJsonForBook(title, author)
            $userEmail = $json_obj->useremail;
            $userPassword = $json_obj->password;

            if(AUTH::validateUser($userEmail, $userPassword) == "valid"){
                $userSearch = $json_obj->bookSearch;
                $userAuthor = $json_obj->bookAuthor;
                $userDescription = $json_obj->bookDescription;
                $userId = YourBooksModel::getIdByEmail($userEmail);
               // echo $userEmail." ".$userPassword." ".$userSearch. " ". $userId;
                $resultSearchBook = GoogleBooks::getJsonForBook($userSearch, $userAuthor, $userId, $userDescription);
                $resultAdd = GoogleBooks::updateUserDB($resultSearchBook, $userId);

                echo $resultAdd;
                http_response_code(200);
            }else{
                echo json_encode([]);
                http_response_code(404);
            }

        } if(preg_match('/\/v1\/bookmarks\/addWishlist\/?$/' , $_SERVER['REQUEST_URI'], $matches)){
            //GoogleBooks::getJsonForBook(title, author)
            $userEmail = $json_obj->useremail;
            $userPassword = $json_obj->password;

            if(AUTH::validateUser($userEmail, $userPassword) == "valid"){
                $userSearch = $json_obj->bookSearch;
                $userAuthor = $json_obj->bookAuthor;
                $userDescription = $json_obj->bookDescription;
                $userId = YourBooksModel::getIdByEmail($userEmail);
               // echo $userEmail." ".$userPassword." ".$userSearch. " ". $userId;
                $resultSearchBook = GoogleBooks::getJsonForBook($userSearch, $userAuthor, $userId, $userDescription);
                $resultAdd = GoogleBooks::updateUserWishlist($resultSearchBook, $userId);

                echo $resultAdd;
                http_response_code(200);
            }else{
                echo json_encode([]);
                http_response_code(404);
            }

        } else {
            http_response_code(404);
        }
        break;

    case "DELETE":
        $json_str = file_get_contents('php://input');
    
        $json_obj = json_decode($json_str);    
       // $json_obj -> nume;
        
        if(preg_match('/\/v1\/bookmarks\/deleteBooksWishlist\/?$/' , $_SERVER['REQUEST_URI'], $matches)) 
        {
            $userEmail = $json_obj->useremail;
            $userPassword = $json_obj->password;

            if(AUTH::validateUser($userEmail, $userPassword) == "valid"){
                $userSearch = $json_obj->bookSearch;
                $userId = YourBooksModel::getIdByEmail($userEmail);
               // echo $userEmail." ".$userPassword." ".$userSearch. " ". $userId;
               $resultDelete = BooxWishlistModel::deleteBookFromDB($userId, $userSearch);
                if(isset($resultDelete)){
                    echo "stergere reusita";
                }else{
                    echo "[stergere esuata] nu exista aceasta carte in Baza de date";
                }

                
                http_response_code(200);
            }else{
                echo json_encode([]);
                http_response_code(404);
            }
        } if(preg_match('/\/v1\/bookmarks\/deleteYourBooks\/?$/' , $_SERVER['REQUEST_URI'], $matches)){
            //GoogleBooks::getJsonForBook(title, author)
            $userEmail = $json_obj->useremail;
            $userPassword = $json_obj->password;

            if(AUTH::validateUser($userEmail, $userPassword) == "valid"){
                $userSearch = $json_obj->bookSearch;
                $userId = YourBooksModel::getIdByEmail($userEmail);
               // echo $userEmail." ".$userPassword." ".$userSearch. " ". $userId;
               $resultDelete = YourBooksModel::deleteBookFromDB($userId, $userSearch);
                if(isset($resultDelete)){
                    echo "[stergere reusita]";
                }else{
                    echo "[stergere esuata] nu exista aceasta carte in Baza de date";
                }

                
                http_response_code(200);
            }else{
                echo json_encode([]);
                http_response_code(404);
            }

        } else {
            http_response_code(404);
        }
        break;
    default:
        break;
}