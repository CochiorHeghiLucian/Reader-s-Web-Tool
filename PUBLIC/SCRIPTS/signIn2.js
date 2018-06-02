function checkFormInput(){

    document.getElementsByName("submit").disabled=true; 

    var serverMessage=document.getElementsByName('serverMessage')[0];
    serverMessage.innerHTML=""; // reseting the error alert paragraph

    var frameTitle=document.getElementsByClassName('frameTitle')[0];
    frameTitle.style.display=""; // making visible the frame title

    
}