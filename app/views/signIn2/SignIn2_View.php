<!DOCTYPE html>

<html>

<head>

	<title> BooX LogIn</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="height=device-height, initial-scale=1.0">
	<link rel="stylesheet" href="http://localhost/ProiectTWTEST/PUBLIC/CSS/Styles.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="http://localhost/ProiectTWTEST/PUBLIC/CSS/mediaLogIn.css">
	<script type="text/javascript" src="http://localhost/ProiectTWTEST/PUBLIC/SCRIPTS/signIn2.js"></script>
</head>

<body style="background-image:url(http://localhost/ProiectTWTEST/PUBLIC/IMAGES/bookshelves-wallpaper-1920x1080.jpg); background-repeat: no-repeat;">
	<div class="bookFrame bookFrame--Sign2">
		<p class="frameTitle frameTitle--signIn2">Sign In</p>
		<form onsubmit="checkFormInput(); return false;">

		<p class="signInErrorMessage" name="serverMessage"></p>
		
 			<section class="signInContainer">
 				<label class="request">Favorite authors:</label>
 				<textarea required name="authors" class="respons" rows="3" cols="50" placeholder="Author1, Authors2, ..."></textarea>
 			</section>
			 <section class="signInContainer">
			 	<label class="request">Favorite genres:</label>
 				<textarea required name="genres" class="respons" rows="3" cols="50" placeholder="Genre1, Genre2, ..."></textarea>
 			</section>
			<section class="signInContainer">
 				<label class="request">Favorite books:</label>
 				<textarea required name="books" class="respons" rows="3" cols="50" placeholder="Book1, Book2, ..."></textarea>
 			</section>
			<section class="signInContainer">
 				<label class="request">Favorite quote:</label>
 				<textarea required name="quote" class="respons" rows="3" cols="50" placeholder="Enter yout favorite quote here!"></textarea>
 			</section >
			<div class="termsOfUsecheckBox">
				<input type="checkbox" name="agreeOrNot">
 				<label for="termsOfUse" class="bookFrame__newUser bookFrame__newUser--signIn">By signing up, I agree to the 
 				<a href="#"  class="bookFrame__newUser bookFrame__newUser--signIn">Terms of use</a></label>
			</div>
			<input type="submit" name="submit" class="bookFrame__inputText bookFrame__inputText--SignIn bookFrame__submitButton_continue bookFrame__submitButton_continue--SignIn">
		</form>
 	</div>
 	<footer class="footerSeparator">
 		<ul class="footerSeparator__ul">
 			<li class="footerSeparator__ul__li">
 				&copy; 2018 BooX 
 			</li>
  		</ul>
 	</footer>
</body>

</html> 