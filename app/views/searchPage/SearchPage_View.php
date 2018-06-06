<!DOCTYPE html>

<html>

<head>
	<title> Search books </title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="~/../../PUBLIC/CSS/Styles.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Annie Use Your Telescope' rel='stylesheet'>
	<link href='https://fonts.googleapis.com/css?family=Acme' rel='stylesheet'>
</head>

<body onLoad="getSeachBooks()" id="body">
	<nav class="headerNavigator">
		<ul class="headerNavigator__ul">
			<li class="headerNavigator__ul__li"><a class="headerNavigator__ul__li__a" href="http://localhost/ProiectTWTEST/PUBLIC/yourBoox"> Your booX </a></li>
			<li class="headerNavigator__ul__li"><a class="headerNavigator__ul__li__a" href="http://localhost/ProiectTWTEST/PUBLIC/booxWishlist"> BooX Wishlist </a></li>
			<li class="headerNavigator__ul__li headerNavigator__ul__logOut"><a class="headerNavigator__ul__li__a" href="../HTML/LogIn"> Log Out </a></li>
			<li class="headerNavigator__ul__li headerNavigator__ul__logOut ">
				<a class="headerNavigator__ul__li__a headerNavigator__ul__li__a--home headerNavigator__ul__home " href="http://localhost/ProiectTWTEST/PUBLIC/profile">
					<i class="fa fa-home" style="font-size:23px;color:#A40A3C"></i>
					Home 
				</a>
			</li>
		</ul>
		<form class="headerNavigator__searchForm">
			<input class="headerNavigator__searchForm__text" type="text" placeholder="Search for booX">
			<button class="headerNavigator__searchForm__button"> <a href="../HTML/searchPage" style="text-decoration:none;"> Search </a></button>
		</form>
 	</nav>

 		<section class="topFrame__cover uni--absolute topFrame__cover--noBorder" id="bookContainer">

		 <p class="none" id="errorSearch"></p>

        <!-- <div class="container">
        	<div class="coverBlockImage">
        		<img src="../Images/img4.jpg">
        	</div>
        	<div class="descriptionBook">
        		<h1>Description:</h1>
        		<p>
        			f dsahfgsadg fsdfgdsagfhgds afgsaffdw tefadsad fdsytsafsd fsdafsad gsaf
        			dsfda. sdfsadffasdfasd .sdf sdagfag.fdsaf sdf sg..dsfagdsagfadg.sdgasffdg
        			gdsagasgsd.gsdsadgsad.sagdg  sag sags. gsagsf. fdsgfdsgfsdgfdg  gfafgfdgd
        			dsafgsdgafdgagfdagadgfagfahdfhghafdgah
        		</p>
        	</div>
            <h1 class="title"> RUSSIAN ROULETTE</h1>
            <button onclick="document.getElementById('modal-wrapper').style.display='block'" class="button">Choose book</button>
            <p class="nickname">A-fsaf_dssaf-Adsad </p>
        </div> -->
      </section>

 	<footer class="footerSeparator footerSeparator--search">
 		<ul class="footerSeparator__ul">
 			<li class="footerSeparator__ul__li">
 				&copy; 2018 BooX 
 			</li>
  		</ul>
 	</footer>


   
<!-- <div id="modal-wrapper" class="modal">
  
  <form class="modal-content animate container" >
     <span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Close PopUp">&times;</span>


    <div class=" container container--popup">
        <div>
            <p class="title title--popup"> A Higher Loyalty </p>
            <div class="coverBlockImage coverBlockImage--popup">
                <img src="../Images/img1.jpg">
                <input class="popupButton" type="button" value="Choose book"> 
            </div>

        </div> -->

        <!-- <div>
            <p class="title title--popup"> DUNKIRK </p>
            <div class="coverBlockImage coverBlockImage--popup">
                <img src="../Images/img2.jpg">
                <input class="popupButton" type="button" value="Choose book"> 
            </div>
        </div>


         <div>
            <p class="title title--popup"> A WRINKLE IN TIME </p>
            <div class="coverBlockImage coverBlockImage--popup">
                <img src="../Images/img3.jpg">
                <input class="popupButton" type="button" value="Choose book"> 
            </div>
        </div>


         <div>
            <p class="title title--popup"> RUSSIAN ROULETTE </p>
            <div class="coverBlockImage coverBlockImage--popup">
                <img src="../Images/img4.jpg">
                <input class="popupButton" type="button" value="Choose book"> 
            </div>
        </div> -->

     </div>


    
  </form>
  
</div>

</body>

<script>
	function getSeachBooks(){
    let mockReq = new XMLHttpRequest();
    mockReq.open('GET', 'http://localhost/ProiectTWTEST/PUBLIC/searchBook/getBooksToDisplay');

    mockReq.addEventListener('load', function onLoad(){
        let jsonResp = JSON.parse(mockReq.response);
        switch(mockReq.status){
            case 200:
                console.log("Call ajax success!-> "+ mockReq.response);
                addElementsToSearchBook(jsonResp);
        
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



	function addElementsToSearchBook(jsonResp){
		console.log(jsonResp);
		console.log(Object.keys(jsonResp).length);

		var mySection = document.getElementById("bookContainer");

//  <div class="container" >
//         	<div class="coverBlockImage" >
//         		<img src="../Images/img1.jpg">
//         	</div>

//         	<div class="descriptionBook">
//         		<h1>Description</h1>
//         		<p>
//         			f dsahfgsadg fsdfgdsagfhgds afgsaffdw tefadsad fdsytsafsd fsdafsad gsaf
//         			dsfda. sdfsadffasdfasd .sdf sdagfag.fdsaf sdf sg..dsfagdsagfadg.sdgasffdg
//         			gdsagasgsd.gsdsadgsad.sagdg  sag sags. gsagsf. fdsgfdsgfsdgfdg  gfafgfdgd
//         			dsafgsdgafdgagfdagadgfagfahdfhghafdgah
//         		</p>
//         	</div>
//             <h1 class="title"> A HIGHER LOYALTY</h1>
//             <button class="button">Remove book</button>
//         </div>

		if(Object.keys(jsonResp).length == 0){
			document.getElementById("errorSearch").innerHTML = "Nu s-a gasit nici o carte in DB";
			document.getElementById("errorSearch").classList.remove("none");
		}
        

		for(var i=0; i<Object.keys(jsonResp).length; i++){
		//creez div-container
		var elemDivContainer = document.createElement("div");
		elemDivContainer.setAttribute("class", "container");
		elemDivContainer.setAttribute("id", 'container_'+i)

		mySection.appendChild(elemDivContainer);

		var elem = document.createElement("div");
		elem.setAttribute("class", "coverBlockImage");

		var image = "";

		if(jsonResp[i].image == ""){
  	  		image = "http://localhost/ProiectTWTEST/PUBLIC/IMAGES/noImage.jpg";
		}else{
 		   image = jsonResp[i].image;
		}


		var imgElem = document.createElement("img");
		imgElem.setAttribute("src", image);
		elem.appendChild(imgElem);

		elemDivContainer.appendChild(elem);

		var elemDivDescription = document.createElement("div");
		elemDivDescription.setAttribute("class", "descriptionBook");
		elemDivContainer.appendChild(elemDivDescription);

		var elemH1 = document.createElement("h1");
		elemH1.innerHTML = "Description:";
		elemDivDescription.appendChild(elemH1);

		//pregatire descriere;
		var vectorCuvinte = jsonResp[i].description.split(" ");
		var descriereCarte = "";
		for(var j=0;j<= 25;j++){
   			if(vectorCuvinte[j] != null)
   				 descriereCarte = descriereCarte +" "+vectorCuvinte[j];
		}

		descriereCarte += "...";


		var elemParagraf = document.createElement("p");		
		elemParagraf.innerHTML = descriereCarte;
		elemDivDescription.appendChild(elemParagraf);

		var elemH1Title = document.createElement("h1");
		elemH1Title.setAttribute("class", "title");
		elemH1Title.setAttribute("id", 'title_'+i);
		elemH1Title.innerHTML = jsonResp[i].title;
		elemDivContainer.appendChild(elemH1Title);

		var elemButton = document.createElement("button");
		elemButton.setAttribute("class", "button");
		elemButton.setAttribute("type", "button");
		elemButton.setAttribute("id", 'button_'+i);
		elemButton.setAttribute("onclick", "displayUserBooks("+  "'" + i + "'" +")");
		elemButton.innerHTML = "Choose book";
		elemDivContainer.appendChild(elemButton);

		var elementParagrafTitle = document.createElement("p");
		elementParagrafTitle.setAttribute('class', 'nickname');
		elementParagrafTitle.innerHTML = jsonResp[i].username;
		elemDivContainer.appendChild(elementParagrafTitle);
		//trimit cartile si username-ul
		//sendDataToChooseController(json[i].afisare, json[i].username);


		//end for

	}
}

function displayUserBooks(index){	
		
		let mockReq = new XMLHttpRequest();
		mockReq.open('POST', 'http://localhost/ProiectTWTEST/PUBLIC/searchList/getBooksToDisplay');
		//console.log("TEST:_> "+index);
		mockReq.addEventListener('load', function onLoad(){
  	    let jsonResp;

 	   switch(mockReq.status){
			case 200:
			 	//jsonResp = JSON.parse(mockReq.response);
				// console.log("Call ajax success! S-a trimis titlul" + mockReq.response );
				
				window.location.href = "http://localhost/ProiectTWTEST/PUBLIC/searchList";
           	 
           	 break;
       	 default:
          	  break;
   		}
	});

	mockReq.addEventListener('error', () => {
    console.error("Something is failed!");
	});


	//console.log("TEST:_> "+index);
	mockReq.send(index);
	//JSON.stringify(payload)

	

}


	

</script>

</html> 