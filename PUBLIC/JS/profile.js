function getProfileInformation(){
    let mockReq = new XMLHttpRequest();
    mockReq.open('GET', 'http://localhost/ProiectTWTEST/PUBLIC/profile/getUserProfileInformation');

    mockReq.addEventListener('load', function onLoad(){
        let jsonResp = JSON.parse(mockReq.response);
        switch(mockReq.status){
            case 200:
                console.log("Call ajax success!");
                changeTextElements(jsonResp);
                
                break;
            default:
                console.log("Alte probleme");
                break;
        }
    });

    mockReq.addEventListener('error', () =>{
        console.error("Something failled");
    });

    mockReq.send();
}

function changeTextElements(jsonResp){
    document.getElementById("authors").innerHTML = jsonResp.authors;
    document.getElementById("genres").innerHTML = jsonResp.genres;
    document.getElementById("books").innerHTML = jsonResp.books;
    document.getElementById("location").innerHTML = jsonResp.location[1]+', '+jsonResp.location[0];
    document.getElementById("facebook").innerHTML = jsonResp.facebook;
    document.getElementById("twitter").innerHTML = jsonResp.twitter;
    document.getElementById("rating").innerHTML = jsonResp.rating;
    document.getElementById("quote").innerHTML = '"'+jsonResp.quote+'"';


}

function hideDiv(id){
		
    var element = document.getElementById(id);
    if(!element.classList.contains("none")){
       element.classList.add("none");
   }
    

}

function displayDiv(id){
   var element = document.getElementById(id);
   if(element.classList.contains("none")){
       element.classList.remove("none");
   }
}