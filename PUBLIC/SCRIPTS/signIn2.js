function checkFormInput(){

    document.getElementsByName("submit").disabled=true; 

    var serverMessage=document.getElementsByName('serverMessage')[0];
    serverMessage.innerHTML=""; // reseting the error alert paragraph

    var frameTitle=document.getElementsByClassName('frameTitle')[0];
    frameTitle.style.display=""; // making visible the frame title

    var formInput={

        'authors':document.getElementsByName('authors')[0].value,
        'genres':document.getElementsByName('genres')[0].value,
        'books':document.getElementsByName('books')[0].value,
        'quote':document.getElementsByName('quote')[0].value,
        'termsOfUseCheckbox':document.getElementsByName('agreeOrNot')[0].checked
    };

    var formInputJSON=JSON.stringify(formInput);

    var ajax = new XMLHttpRequest();

    ajax.open("POST","http://localhost/ProiectTWTEST/PUBLIC/signIn2/validateInput", true);

    ajax.onreadystatechange = function(){

        if(ajax.readyState == 4 && ajax.status == 200){

            serverMessage.style.margin="60px 0px 60px 0px";
            frameTitle.style.display="none";

            if(ajax.response == "RedirectToLogIn"){

                serverMessage.innerHTML="Please wait ...";

                window.location.replace = "http://localhost/ProiectTWTEST/PUBLIC/login";
            }
            else{
                
                document.getElementsByName("submit").disabled=false;
                
                if(ajax.response == "TermsOfUseNotChecked"){

                    serverMessage.innerHTML="Terms of use not checked!";
                }
            }
        }
    }

    ajax.send(formInputJSON);
}