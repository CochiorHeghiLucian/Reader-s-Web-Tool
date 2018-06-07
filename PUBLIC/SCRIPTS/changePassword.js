function checkFormInput(){

    document.getElementsByName("submit").disabled=true; 

    var serverMessage=document.getElementsByName('serverMessage')[0];
    serverMessage.innerHTML=""; // reseting the error alert paragraph

    var frameTitle=document.getElementsByClassName('frameTitle')[0];
    frameTitle.style.display=""; // making visible the frame title

    var formInput={

        'email':document.getElementsByName('email')[0].value,
        'changePassword':document.getElementsByName('password')[0].value,
        'retypePassword':document.getElementsByName('retypePassword')[0].value
    };

    var formInputJSON=JSON.stringify(formInput);

    var ajax = new XMLHttpRequest();

    ajax.open("POST","http://localhost/ProiectTWTEST/PUBLIC/changePassword/validateInput", true);

    ajax.onreadystatechange = function(){

        if(ajax.readyState == 4 && ajax.status == 200){

            serverMessage.style.margin="30px 0 30px 0";
            frameTitle.style.display="none";

            if(ajax.response == "RedirectToLogIn"){

                serverMessage.innerHTML = "Please wait ...";

                window.location.assign("http://localhost/ProiectTWTEST/PUBLIC/login");
            }
            else{

                document.getElementsByName("submit").disabled=false;

                if(ajax.response == "PasswordNotMatchingRetypedPassword")
                {
                    serverMessage.innerHTML="Password/password confirm mismatch!";
                }
                else if(ajax.response == "invalidEmail"){

                    serverMessage.innerHTML = "Email address not recognized."
                }
            }
        }
    }

    ajax.send(formInputJSON);
}