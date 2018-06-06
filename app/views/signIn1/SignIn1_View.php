<!DOCTYPE html>

<html>

<head>
	<title> BooX SignIn</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="height=device-height, initial-scale=1.0">
	<link rel="stylesheet" href="http://localhost/ProiectTWTEST/PUBLIC/CSS/Styles.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="http://localhost/ProiectTWTEST/PUBLIC/CSS/mediaLogIn.css">
	<script type="text/javascript" src="http://localhost/ProiectTWTEST/PUBLIC/SCRIPTS/signIn1.js"></script>
</head>

<body style="background-image:url(http://localhost/ProiectTWTEST/PUBLIC/IMAGES/bookshelves-wallpaper-1920x1080.jpg); background-repeat: no-repeat;">

	<div class="bookFrame bookFrame--signIn">

	<p class="frameTitle frameTitle--signIn">Sign In</p>

	<form onsubmit="checkFormInput(); return false;">
		
		<p class="signInErrorMessage" name="serverMessage"></p>

		<input required name="firstName" type="text" class="bookFrame__inputText bookFrame__inputText--SignIn" placeholder="First Name">  
		<input required name="lastName" type="text" class="bookFrame__inputText bookFrame__inputText--SignIn" placeholder="Last Name">
		<input required name="nickName" type="text"  class="bookFrame__inputText bookFrame__inputText--SignIn" placeholder="Nickname">
		
		<div class="bookFrame__inputText bookFrame__inputText--SignIn">
			<input id="male" type="radio" name="gender"><label>Male </label>
			<input id="female" type="radio" name="gender"><label>Female</label>
		</div>

 		<input required name="dateOfBirth" type="date" class="bookFrame__inputText bookFrame__inputText--SignIn">
 			
 		<input required name="phoneNo" type="tel" class="bookFrame__inputText bookFrame__inputText--SignIn" placeholder="Phone number">
 		<input required name="email" type="email" class="bookFrame__inputText bookFrame__inputText--SignIn" placeholder="Email">
 		<input required name="retypeEmail" type="email" class="bookFrame__inputText bookFrame__inputText--SignIn" placeholder="Retype email">
 		<input required name="password" type="password" class="bookFrame__inputText bookFrame__inputText--SignIn" placeholder="Choose password">
 		<input required name="retypePassword" type="password" class="bookFrame__inputText bookFrame__inputText--SignIn" placeholder="Confirm password">

 		<div class="footerSeparator footerSeparator--form footerSeparator--form--SignIn"></div>
 		
 		<input required name="street" type="text" class="bookFrame__inputText bookFrame__inputText--SignIn" placeholder="Street Address">
 		<input required name="apartment" type="text" class="bookFrame__inputText bookFrame__inputText--SignIn" placeholder="Apartment">
 		<input required name="country" type="text" class="bookFrame__inputText bookFrame__inputText--SignIn" placeholder="Country">
 		<input required name="city" type="text" class="bookFrame__inputText bookFrame__inputText--SignIn" placeholder="City">
 		<input required name="ZIP" type="text" class="bookFrame__inputText bookFrame__inputText--SignIn" placeholder="ZIP code">

 		<div class="bookFrame__inputText bookFrame__inputText--SignIn ">Choose profile image
			 <input name="profilePic" type="file" class="bookFrame__inputText__hideFile bookFrame__inputText__hideFile--SignIn">
		</div>
		<div class="bookFrame__inputText bookFrame__inputText--SignIn ">Choose wallpaper image
			<input name="wallpaperPic" type="file" class="bookFrame__inputText__hideFile bookFrame__inputText__hideFile--SignIn">
		</div>
		
		<input type="submit" name="submit" class="bookFrame__inputText bookFrame__inputText--SignIn bookFrame__submitButton_continue bookFrame__submitButton_continue--SignIn">

	</form>
	 
	</div>

 	<footer class="footerSeparator">
 		<ul class="footerSeparator__ul">
 			<li class="footerSeparator__ul__li">
 				&copy; 2018 BooX | 
 			</li>
 			<li class="footerSeparator__ul__li">
 				<a href="#" class="footerSeparator__ul__li__a" style="color: white">Home Page</a>
 			</li>
  		</ul>
	</footer>

</body>

</html> 