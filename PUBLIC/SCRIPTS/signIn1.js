function checkFormInput(){
    
    document.getElementsByName("submit").disabled=true; 

    var serverMessage=document.getElementsByName('serverMessage')[0];
    serverMessage.innerHTML=""; // reseting the error alert paragraph

    var frameTitle=document.getElementsByClassName('frameTitle')[0];
    frameTitle.style.display=""; // making visible the frame title

    var formInput={

        'firstName':document.getElementsByName('firstName')[0].value,
        'lastName':document.getElementsByName('lastName')[0].value,
        'nickName':document.getElementsByName('nickName')[0].value,
        'male':document.getElementById('male').checked,
        'female':document.getElementById('female').checked,
        'dateOfBirth':document.getElementsByName('dateOfBirth')[0].value,
        'phoneNo':document.getElementsByName('phoneNo')[0].value,
        'email':document.getElementsByName('email')[0].value,
        'retypeEmail':document.getElementsByName('retypeEmail')[0].value,
        'password':document.getElementsByName('password')[0].value,
        'retypePassword':document.getElementsByName('retypePassword')[0].value,
        'street':document.getElementsByName('street')[0].value,
        'apartment':document.getElementsByName('apartment')[0].value,
        'country':document.getElementsByName('country')[0].value,
        'city':document.getElementsByName('city')[0].value,
        'ZIP':document.getElementsByName('ZIP')[0].value,
        'facebook':document.getElementsByName('facebook')[0].value,
        'twitter':document.getElementsByName('twitter')[0].value
    };

    var formInputJSON=JSON.stringify(formInput);

    var ajax = new XMLHttpRequest();

    ajax.open("POST","http://localhost/ProiectTWTEST/PUBLIC/signIn1/validateInput", true);

    ajax.onreadystatechange = function(){

        if(ajax.readyState == 4 && ajax.status == 200){

            serverMessage.style.margin="30px 0 30px 0";
            frameTitle.style.display="none";

            if(ajax.response == "RedirectToSignIn2"){
                
                window.location.assign("http://localhost/ProiectTWTEST/PUBLIC/signIn2");
            }
            else{

                document.getElementsByName("submit").disabled=false;

                if(ajax.response == "invalidUserName")
                {
                    serverMessage.innerHTML = "User name already used!";
                }
                else if(ajax.response == "EmailAlreadyInDB"){

                    serverMessage.innerHTML="Email already used!";
                }
                else if(ajax.response=="EmailNotMatchingRetypedEmail"){

                    serverMessage.innerHTML="Email/retyped email mismatch!";
                }
                else if(ajax.response=="PasswordNotMatchingRetypedPassword"){

                    serverMessage.innerHTML="Password/password confirm mismatch!";
                }
                else if(ajax.response=="GenderNotSelected"){

                    serverMessage.innerHTML="Gender not selected!";
                }
            }
        }
    }

    ajax.send(formInputJSON);
} 