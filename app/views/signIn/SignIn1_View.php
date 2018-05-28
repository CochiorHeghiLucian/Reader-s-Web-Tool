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
</head>

<body style="background-image:url(http://localhost/ProiectTWTEST/PUBLIC/IMAGES/bookshelves-wallpaper-1920x1080.jpg); background-repeat: no-repeat;">

	<div class="bookFrame bookFrame--signIn">

	<p class="frameTitle frameTitle--signIn">Sign In</p>
	
	<form action="signIn_Controller.php" method="POST">
	
		<input name="firstName" type="text" class="bookFrame__inputText bookFrame__inputText--SignIn" placeholder="First Name" required>
		<input name="lastName" type="text" class="bookFrame__inputText bookFrame__inputText--SignIn" placeholder="Last Name" required>
		<input name="nickName" type="text"  class="bookFrame__inputText bookFrame__inputText--SignIn" placeholder="Nickname" required>
		
		<div class="bookFrame__inputText bookFrame__inputText--SignIn">
			<input type="radio" name="male" required><label for="male"> Male </label>
			<input type="radio" name="female" required><label for="female"> Female</label>
		</div>

 		<input name="date" type="date" class="bookFrame__inputText bookFrame__inputText--SignIn" required>
 			
 		<input name="phoneNo" type="Phone" class="bookFrame__inputText bookFrame__inputText--SignIn" placeholder="Phone number" required>
 		<input name="email" type="email" class="bookFrame__inputText bookFrame__inputText--SignIn" placeholder="email" required>
 		<input name="retypeEmail" type="email" class="bookFrame__inputText bookFrame__inputText--SignIn" placeholder="Retype email" required>
 		<input name="password" type="password" class="bookFrame__inputText bookFrame__inputText--SignIn" placeholder="Choose password" required>
 		<input name="retypePassword" type="password" class="bookFrame__inputText bookFrame__inputText--SignIn" placeholder="Confirm password" required>

 		<div class="footerSeparator footerSeparator--form footerSeparator--form--SignIn"></div>
 		
 		<input name="street" type="text" class="bookFrame__inputText bookFrame__inputText--SignIn" placeholder="Street Address" required>
 		<input name="apartment" type="text" class="bookFrame__inputText bookFrame__inputText--SignIn" placeholder="Apartment" required>
 		<input name="country" type="text" class="bookFrame__inputText bookFrame__inputText--SignIn" placeholder="Country" required>
 		<input name="city" type="text" class="bookFrame__inputText bookFrame__inputText--SignIn" placeholder="City" required>
 		<input name="ZIP" type="text" class="bookFrame__inputText bookFrame__inputText--SignIn" placeholder="ZIP code" required>

 		<div class="bookFrame__inputText bookFrame__inputText--SignIn ">Choose profile image
			 <input name="profilePic" type="file" class="bookFrame__inputText__hideFile bookFrame__inputText__hideFile--SignIn">
		</div>
		<div class="bookFrame__inputText bookFrame__inputText--SignIn ">Choose wallpaper image
			<input name="wallpaperPic" type="file" class="bookFrame__inputText__hideFile bookFrame__inputText__hideFile--SignIn">
		</div>
		
		<input name="submit" type="submit" value="Continue registration" class="bookFrame__inputText bookFrame__inputText--SignIn bookFrame__submitButton_continue bookFrame__submitButton_continue--SignIn">

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