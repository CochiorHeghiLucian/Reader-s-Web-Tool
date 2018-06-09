window.onload=getUserLocation;

function getUserLocation() {
    
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(sendCoordinatesToServer);
    }
}

function sendCoordinatesToServer(position){
    
    var userCoordinates = {

        'latitude':position.coords.latitude,
        'longitude':position.coords.longitude
    }

    var JSON_coordinates=JSON.stringify(userCoordinates);

    var ajax = new XMLHttpRequest();

    ajax.open("POST","http://localhost/ProiectTWTEST/PUBLIC/setUserGlobalPosition", true);

    ajax.onreadystatechange = function(){

        if(ajax.readyState == 4 && ajax.status == 200){

            if(ajax.response == "OK"){

                console.log('ok');
            }
            else{

                console.log('not ok');
            }
        }
    }

    ajax.send(JSON_coordinates); 
}






