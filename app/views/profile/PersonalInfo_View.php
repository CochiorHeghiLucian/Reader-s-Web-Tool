<!DOCTYPE html>

<html>

<head>
	<title> BooX Profile </title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="~/../../PUBLIC/CSS/Styles.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body onLoad="getProfileInformation()">
	<nav class="headerNavigator">
		<ul class="headerNavigator__ul">
			<li class="headerNavigator__ul__li"><a class="headerNavigator__ul__li__a" href="http://localhost/ProiectTWTEST/PUBLIC/yourBoox"> Your booX </a></li>
			<li class="headerNavigator__ul__li"><a class="headerNavigator__ul__li__a" href="../HTML/WishListBooks"> BooX Wishlist </a></li>
			<li class="headerNavigator__ul__li headerNavigator__ul__logOut"><a class="headerNavigator__ul__li__a" href="../HTML/LogIn"> Log Out </a></li>
		</ul>
		<form class="headerNavigator__searchForm">
			<input class="headerNavigator__searchForm__text" type="text" placeholder="Search for booX">
			<button class="headerNavigator__searchForm__button"> <a href="../HTML/searchPage" 
				style="text-decoration: none;"> Search </a></button>
		</form>
 	</nav>

 	<div >
 		<div class="topFrame__cover">
 			<img class="topFrame__cover__wallpaper" src="~/../../PUBLIC/IMAGES/wallpaper.jpg" alt="wallpaper">
 			<img class="topFrame__cover__profilePicture" src="~/../../PUBLIC/IMAGES/profilePicture.jpg" href="#">
 			<a class="topFrame__wallpaper__editProfile" href="#"> Edit profile </a>
 		</div>
 	</div>

 	<div class="aboutUser" >
 		<div class="aboutUser__tab aboutUser__tab__personalInfoPreferences">

 			<ul class="aboutUser__tab__personalInfoPreferences__ul">
 				<li class="aboutUser__personalInfoPreferences__ul__li"> 
 					<button class="aboutUser__personalInfoPreferences__ul__li__a"  onclick="displayDiv('profil_personal_info');hideDiv('profil_preference');"> Personal Info  
 				</li>
 				<li class="aboutUser__personalInfoPreferences__ul__li"> 
 					<button class="aboutUser__personalInfoPreferences__ul__li__a" onclick="displayDiv('profil_preference');hideDiv('profil_personal_info');"> Preferences
 				</li>
 			</ul>


 			<ul class="aboutUser_ul " id="profil_personal_info">
 				<li class="aboutUser_ul_li"> <i class="fa fa-home" style="font-size:30px;color:#A40A3C"></i> Lives in: <span id="location">  </span> </li>
 				<li class="aboutUser_ul_li"> <i class="fa fa-facebook-square" style="font-size:30px; color:#A40A3C"></i> Facebook account: <span id="facebook">  </span> </li>
 				<li class="aboutUser_ul_li"> <i class="fa fa-twitter-square" style="font-size:30px; color:#A40A3C"></i> Twitter account: <span id="twitter">  </span> </li>
 				<li class="aboutUser_ul_li"> <i class="fa fa-star" style="font-size:30px; color:#A40A3C"></i> Rating: <span id="rating">  </span> </li>
 			</ul>


 			<ul class="aboutUser_ul none" id="profil_preference">
 				<li class="aboutUser_ul_li"><i class="fa fa-group" style="font-size:30px;color:#A40A3C", ></i> Favorite authors: <span id="authors">  </span> </li>
 				<li class="aboutUser_ul_li"><i class="fa fa-pagelines" style="font-size:30px;color:#A40A3C"></i> Favorite genres: <span id="genres">  </span> </li>
 				<li class="aboutUser_ul_li"><i class="fa fa-book" style="font-size:30px;color:#A40A3C" ></i> Prefered books: <span id="books">  </span> </li>
 			</ul>

 		</div>






	<!-- <div class="aboutUser__tab aboutUser__tab__personalInfoPreferences none" id="profil_preference">
 			<ul class="aboutUser__tab__personalInfoPreferences__ul">
 				<li class="aboutUser__personalInfoPreferences__ul__li"> 
 					<button type="button" class="aboutUser__personalInfoPreferences__ul__li__a" > Personal Info   
 				</li>
 				<li class="aboutUser__personalInfoPreferences__ul__li"> 
 					<button type="button" class="aboutUser__personalInfoPreferences__ul__li__a" onclick="hideDiv('profil_personal_info');displayDiv('profil_preference');" > Preferences </a>  
 				</li>
 			</ul>
 			<ul class="aboutUser_ul">
 				<li class="aboutUser_ul_li"><i class="fa fa-group" style="font-size:30px;color:#A40A3C"></i> Favorite authors: </li>
 				<li class="aboutUser_ul_li"><i class="fa fa-pagelines" style="font-size:30px;color:#A40A3C"></i> Favorite genres: </li>
 				<li class="aboutUser_ul_li"><i class="fa fa-book" style="font-size:30px;color:#A40A3C"></i> Prefered books: </li>
 			</ul>
 		</div> -->






 		<div class="aboutUser__tab aboutUser__tab__favoriteQuote">
 			<p class="aboutUser__tab__favoriteQuote__p" id="quote">  </p>
 		</div>
 	</div>
 	<footer class="footerSeparator footerSeparator--userProfile">
 		<ul class="footerSeparator__ul">
 			<li class="footerSeparator__ul__li">
 				&copy; 2018 BooX 
 			</li>
  		</ul>
 	</footer>
</body>

<<<<<<< Updated upstream
<script src="http://localhost/ProiectTWTEST/PUBLIC/JS/profile.js"> </script>


=======
<script>

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

</script>

<script>

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

</script>
>>>>>>> Stashed changes

</html> 