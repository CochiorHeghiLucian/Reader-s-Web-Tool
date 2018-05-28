<!DOCTYPE html>

<html>

<head>
	<title> BooX Profile </title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="~/../../PUBLIC/CSS/Styles.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	<nav class="headerNavigator">
		<ul class="headerNavigator__ul">
			<li class="headerNavigator__ul__li"><a class="headerNavigator__ul__li__a" href="../HTML/YourBooks"> Your booX </a></li>
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

 	<div class="aboutUser">
 		<div class="aboutUser__tab aboutUser__tab__personalInfoPreferences">
 			<ul class="aboutUser__tab__personalInfoPreferences__ul">
 				<li class="aboutUser__personalInfoPreferences__ul__li"> 
 					<a class="aboutUser__personalInfoPreferences__ul__li__a" href="../HTML/PersonalInfo"> Personal Info </a>  
 				</li>
 				<li class="aboutUser__personalInfoPreferences__ul__li"> 
 					<a class="aboutUser__personalInfoPreferences__ul__li__a" href="../HTML/Preferences"> Preferences </a>  <h1>
 				</li>
 			</ul>
 			<ul class="aboutUser_ul">
 				<li class="aboutUser_ul_li"> <i class="fa fa-home" style="font-size:30px;color:#A40A3C"></i> Lives in: <?php echo $data['location'][1].', '.$data['location'][0]; ?> </li>
 				<li class="aboutUser_ul_li"> <i class="fa fa-facebook-square" style="font-size:30px; color:#A40A3C"></i> Facebook account: <?php echo $data['facebook']?> </li>
 				<li class="aboutUser_ul_li"> <i class="fa fa-twitter-square" style="font-size:30px; color:#A40A3C"></i> Twitter account: <?php echo $data['twitter']; ?> </li>
 				<li class="aboutUser_ul_li"> <i class="fa fa-star" style="font-size:30px; color:#A40A3C"></i> Rating: <?php echo $data['rating']; ?> </li>
 			</ul>
 		</div>






	<!-- <div class="aboutUser__tab aboutUser__tab__personalInfoPreferences none">
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
 		</div> -->






 		<div class="aboutUser__tab aboutUser__tab__favoriteQuote">
 			<p class="aboutUser__tab__favoriteQuote__p">  "<?php echo $data['quote']; ?>"   </p>
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


<script>
	function loadData(){
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				document.getElementById("demo").innerHTML = this.responseText;
			}
		};
		xhttp.open("Get", "http://localhost/ProiectTWTEST/profile/getPreferences", true);
		xhttp.send();
	}
</script>

</html> 