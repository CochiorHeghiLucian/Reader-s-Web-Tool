<!DOCTYPE html>

<html>

<head>
	<title> BooX Profile </title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../CSS/Styles.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	<nav class="headerNavigator">
		<ul class="headerNavigator__ul">
			<li class="headerNavigator__ul__li"><a class="headerNavigator__ul__li__a" href="#"> Your booX </a></li>
			<li class="headerNavigator__ul__li"><a class="headerNavigator__ul__li__a" href="#"> BooX Wishlist </a></li>
			<li class="headerNavigator__ul__li headerNavigator__ul__logOut"><a class="headerNavigator__ul__li__a" href="../HTML/LogIn"> Log Out </a></li>
			<li class="headerNavigator__ul__li headerNavigator__ul__logOut ">
				<a class="headerNavigator__ul__li__a headerNavigator__ul__li__a--home headerNavigator__ul__home " href="../HTML/PersonalInfo">
					<i class="fa fa-home" style="font-size:23px;color:#A40A3C"></i>
					Home 
				</a>
			</li>
		</ul>
		<form class="headerNavigator__searchForm">
			<input class="headerNavigator__searchForm__text" type="text" placeholder="Search for booX">
			<button class="headerNavigator__searchForm__button"> <a href="../HTML/searchPage" style="text-decoration:none;"> Search </a> </button>
		</form>
 	</nav>

 	<div class="topFrame">
 		<div class="topFrame__cover">
 			<img class="topFrame__cover__wallpaper" src="../Images/wallpaper.jpg" alt="wallpaper">
 			<img class="topFrame__cover__profilePicture" src="../Images/profilePicture.jpg" href="#">
 			<a class="topFrame__wallpaper__editProfile" href="#"> Edit profile </a>
 		</div>
 	</div>

 	<div class="aboutUser">
 		<div class="aboutUser__tab aboutUser__tab__personalInfoPreferences">
 			<ul class="aboutUser__tab__personalInfoPreferences__ul">
 				<li class="aboutUser__personalInfoPreferences__ul__li"> 
 					<a class="aboutUser__personalInfoPreferences__ul__li__a" href="../HTML/PersonalInfo"> Personal Info </a>  
 				</li>
 				<li class="aboutUser__personalInfoPreferences__ul__li"> 
 					<a class="aboutUser__personalInfoPreferences__ul__li__a" href="../HTML/Preferences"> Preferences </a>  
 				</li>
 			</ul>
 			<ul class="aboutUser_ul">
 				<li class="aboutUser_ul_li"><i class="fa fa-group" style="font-size:30px;color:#A40A3C"></i> Favorite authors: </li>
 				<li class="aboutUser_ul_li"><i class="fa fa-pagelines" style="font-size:30px;color:#A40A3C"></i> Favorite genres: </li>
 				<li class="aboutUser_ul_li"><i class="fa fa-book" style="font-size:30px;color:#A40A3C"></i> Prefered books: </li>
 			</ul>
 		</div>
 		<div class="aboutUser__tab aboutUser__tab__favoriteQuote">
 			<p class="aboutUser__tab__favoriteQuote__p"> "If one cannot enjoy reading a book over and over again, there is no use in reading at all." (Oscar Wilde)</p>
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

</html> 