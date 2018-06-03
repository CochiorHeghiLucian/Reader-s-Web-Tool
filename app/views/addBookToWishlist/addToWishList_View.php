<!DOCTYPE html>

<html>

<head>
	<title> Lend book </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="height=device-height, initial-scale=1.0">
	<link rel="stylesheet" href="~/../../PUBLIC/CSS/Styles.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href=".~/../../PUBLIC/CSS/mediaLogIn.css">
</head>

<body>
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
		
 	</nav>

 	<form class="aboutUser__tab aboutUser__tab--LendBook">
 			<input class="respons respons--lendBook" type="text" placeholder="Book title" id="title"></input>
 			<input class="respons respons--lendBook" type="text" placeholder="Book author" id="author"></input>
 			<input class="respons respons--lendBook" type="text" placeholder="Book genre" id="description"></input>
 			<button type="button" class="bookFrame__submitButton bookFrame__submitButton--YourBooXAddBook" onclick="getBookInformationFromUser('title', 'author', 'description')">
 				 Add book 
 			</button>
 	</form>

	<span class="" id="errorMessage">  </span>

	<div id="test">

	</div>


 	<footer class="footerSeparatorLendBook">
 		<ul class="footerSeparator__ul">
 			<li class="footerSeparator__ul__li">
 				&copy; 2018 BooX 
 			</li>
  		</ul>
 	</footer>
</body>

<script src="http://localhost/ProiectTWTEST/PUBLIC/SCRIPTS/addBookBooksWishlist.js"> </script>

</html> 