<?php
session_start();
require_once '../app/models/profile_model.php';
require_once '../app/core/Email.php';
require_once '/opt/lampp/htdocs/ProiectTWTEST/app/models/yourBooks_model.php';

class Profile extends Controller{

    public function index(){
       
        $this->view("profile/PersonalInfo_View"); 

        require_once '../app/models/userGlobalPosition_model.php';

        $userId = $_SESSION['userId'];

        $myCoordinates = UserGlobalPosition::getMyCoordinates($userId);
        $otheruUsersCoordinates = UserGlobalPosition::usersCoordinates($userId);

        // https://www.movable-type.co.uk/scripts/latlong.html <-- link for calculating distance between two points based on Latitude && Longitude

        $R = 6371000; // Radius of the Earth in meters
        $phy1 = deg2rad($myCoordinates[0]['latitude']);

        for($i=0;$i<sizeof($otheruUsersCoordinates);++$i){

            $phy2 = deg2rad($otheruUsersCoordinates[$i]['latitude']);
            $deltaPhy = deg2rad($otheruUsersCoordinates[$i]['latitude']-$myCoordinates[0]['latitude']);
            $deltaLambda = deg2rad($otheruUsersCoordinates[$i]['longitude']-$myCoordinates[0]['longitude']);

            $a = sin($deltaPhy/2)*sin($deltaPhy/2)+cos($phy1)*cos($phy2)*sin($deltaLambda/2)*sin($deltaLambda/2);
            $c = 2*atan2(sqrt($a),sqrt(1-$a));
            $d=$R*$c;

            if($d < 10000) // if another BoooX user is at maximum 10km distance
            {   
                $idActualUser = YourBooksModel::getIdByEmail($myCoordinates[0]['email']);
                $idOtherUsers = YourBooksModel::getIdByEmail($otheruUsersCoordinates[$i]['email']);

                if(UserGlobalPosition::cartiIncomun($idActualUser, $idOtherUsers) || UserGlobalPosition::cartiIncomun($idOtherUsers, $idActualUser)){
                    print_r("Au carti in comun");
                 
                $peerMessageBody="<p><strong>Hello!</strong>"."<br>"."<br>".
                "We want to let you know that you have the chance to make a swap with another BooX user:".
                "<br>"."In order to make the swap, you can use the following email address / phone number:".
                "<br>"."<br>".$myCoordinates[0]['email']." / ".$myCoordinates[0]['phoneNumber']."<br>"."<br>".
                "Respectfully, the BooX team."."</p>";

                Email::sendEmail($otheruUsersCoordinates[$i]['email'],$peerMessageBody);

                $forMeMessageBody="<p><strong>Hello!</strong>"."<br>"."<br>".
                "We want to let you know that you have the chance to make a swap with another BooX user:".
                "<br>"."In order to make the swap, you can use the following email address / phone number:".
                "<br>"."<br>".$otheruUsersCoordinates[$i]['email']." / ".$otheruUsersCoordinates[$i]['phoneNumber']."<br>"."<br>".
                "Respectfully, the BooX team."."</p>";

                Email::sendEmail($myCoordinates[0]['email'],$forMeMessageBody);
                }
            }
        }
    }

    public function getUserProfileInformation(){
        
        $userId = $_SESSION['userId'];
        $data = ProfileModel::getPersonalInfoData($userId);
        $data = json_encode($data);
        echo $data;

        
    }

    public function getSearchBooks(){
        $userId = $_SESSION['userId'];
        $title = file_get_contents('php://input');
       // echo $title;
        $data = ProfileModel::getSearchBooksFor($title, $userId);
        $data = json_encode($data);
       // print_r( $data);
        $_SESSION['bookSearchTitle'] = $title;
        $_SESSION['booksFound'] = $data;
        
       // header('Location:http://localhost/ProiectTWTEST/PUBLIC/searchBook');
      //  exit();
    }

}