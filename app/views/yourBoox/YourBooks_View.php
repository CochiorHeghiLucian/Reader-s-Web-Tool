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

<body onLoad="getYourBooks()">
	<nav class="headerNavigator">
		<ul class="headerNavigator__ul">
			<li class="headerNavigator__ul__li"><a class="headerNavigator__ul__li__a" href="http://localhost/ProiectTWTEST/PUBLIC/addBook"> Add Book </a></li>
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
        <!-- <div class="container" >
        	<div class="coverBlockImage" >
        		<img src="http://localhost/ProiectTWTEST/PUBLIC/IMAGES/noImage.jpg">
        	</div>

        	<div class="descriptionBook">
        		<h1>Description</h1>
        		<p>
        			f dsahfgsadg fsdfgdsagfhgds afgsaffdw tefadsad fdsytsafsd fsdafsad gsaf
        			dsfda. sdfsadffasdfasd .sdf sdagfag.fdsaf sdf sg..dsfagdsagfadg.sdgasffdg
        			gdsagasgsd.gsdsadgsad.sagdg  sag sags. gsagsf. fdsgfdsgfsdgfdg  gfafgfdgd
        			dsafgsdgafdgagfdagadgfagfahdfhghafdgah
        		</p>
        	</div>
            <h1 class="title"> A HIGHER LOYALTY</h1>
            <button class="button">Remove book</button>
        </div> -->
    
        
       
      </section>


 	<footer class="footerSeparator footerSeparator--search">
 		<ul class="footerSeparator__ul">
 			<li class="footerSeparator__ul__li">
 				&copy; 2018 BooX 
 			</li>
  		</ul>
 	</footer>
</body>

<script src="http://localhost/ProiectTWTEST/PUBLIC/SCRIPTS/yourBooks.js"> </script>


</html> 