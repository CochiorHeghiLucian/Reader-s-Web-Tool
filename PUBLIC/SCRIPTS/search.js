function searchBook(){
    var title = document.getElementById("inputSearch").value;
    
    let mockReq = new XMLHttpRequest();
    mockReq.open('POST', 'http://localhost/ProiectTWTEST/PUBLIC/profile/getSearchBooks');

    mockReq.addEventListener('load', function onLoad(){
      let jsonResp;

    switch(mockReq.status){
        case 200:
             //jsonResp = JSON.parse(mockReq.response);
             console.log("Call ajax success! S-a trimis titlul" + mockReq.response );
            //completeSearchBookWithDiv(jsonResp);
            window.location.href = "http://localhost/ProiectTWTEST/PUBLIC/searchBook";
            
            break;
        default:
            break;
       }
});

mockReq.addEventListener('error', () => {
console.error("Something is failed!");
});

mockReq.send(title);

}
