<!DOCTYPE html>
<html>
<head>
	<title> BooX Profile </title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="~/../../PUBLIC/CSS/Styles.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="http://localhost/ProiectTWTEST/PUBLIC/SCRIPTS/userGlobalPosition.js"></script>
</head>

<body onLoad="getProfileInformation()">
	<nav class="headerNavigator">
		<ul class="headerNavigator__ul">
			<li class="headerNavigator__ul__li"><a class="headerNavigator__ul__li__a" href="http://localhost/ProiectTWTEST/PUBLIC/yourBoox"> Your booX </a></li>
			<li class="headerNavigator__ul__li"><a class="headerNavigator__ul__li__a" href="http://localhost/ProiectTWTEST/PUBLIC/booxWishlist"> BooX Wishlist </a></li>
			<li class="headerNavigator__ul__li headerNavigator__ul__logOut"><a class="headerNavigator__ul__li__a" href="http://localhost/ProiectTWTEST/PUBLIC/logOut"> Log Out </a></li>
		</ul>
		<form class="headerNavigator__searchForm">
			<input class="headerNavigator__searchForm__text" type="text" placeholder="Search for booX" id="inputSearch">
			<button type="button" class="headerNavigator__searchForm__button" onclick="searchBook()"> Search </button>
		</form>
 	</nav>

 	<div>
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

<script type="text/javascript" src="http://localhost/ProiectTWTEST/PUBLIC/SCRIPTS/profile.js"></script>
<script type="text/javascript" src="http://localhost/ProiectTWTEST/PUBLIC/SCRIPTS/search.js"></script>

</html> 