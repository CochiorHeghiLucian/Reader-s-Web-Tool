function checkFormInput(){
    
    document.getElementsByName("submit").disabled=true; 

    var errorParagraph=document.getElementsByName('error')[0];
    errorParagraph.innerHTML=""; // reseting the error alert paragraph

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
        'profilePic':document.getElementsByName('profilePic')[0].value,
        'wallpaperPic':document.getElementsByName('wallpaperPic')[0].value
    };

    var formInputJSON=JSON.stringify(formInput);

    var ajax = new XMLHttpRequest();

    ajax.open("POST","http://localhost/ProiectTWTEST/PUBLIC/signIn/validateInput", true);

    ajax.onreadystatechange = function(){

        if(ajax.readyState == 4 && ajax.status == 200){

            if(ajax.response == "RedirectToSignIn2"){

                // REDIRECT TO SIGN IN 2

            }
            else{

                document.getElementsByName("submit").disabled=false;

                errorParagraph.style.margin="30px 0 30px 0";
                frameTitle.style.display="none";

                if(ajax.response == "EmailAlreadyInDB"){

                    errorParagraph.innerHTML="Email already used!";
                }
                else if(ajax.response=="EmailNotMatchingRetypedEmail"){

                    errorParagraph.innerHTML="Email/retyped email mismatch!";
                }
                else if(ajax.response=="PasswordNotMatchingRetypedPassword"){

                    errorParagraph.innerHTML="Password/retyped password mismatch!";
                }
                else if(ajax.response=="GenderNotSelected"){

                    errorParagraph.innerHTML="Gender not selected!";
                }
            }
        }
    }

    ajax.send(formInputJSON);
} 

// // !!! NEED TO FIND THE FUNCTION TO CONVERT THE UPLOADED IMAGES TO BYTES