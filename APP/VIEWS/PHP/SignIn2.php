<!DOCTYPE html>

<html>

<head>

	<title> BooX LogIn</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="height=device-height, initial-scale=1.0">
	<link rel="stylesheet" href="../CSS/Styles.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="../CSS/mediaLogIn.css">

</head>

<body style="background-image:url(../Images/bookshelves-wallpaper-1920x1080.jpg)">
 	<div class="bookFrame bookFrame--Sign2">

 		<p class="frameTitle frameTitle--signIn2">Sign In</p>

 		<section class="signInContainer">
 			<label class="request">Favorite authors:</label>
 			<textarea class="respons" rows="3" cols="50" placeholder="Authors1, Authors2, ..."></textarea>
 		</section>


 		<section class="signInContainer">
 			<label class="request">Favorite genres:</label>
 			<textarea class="respons" rows="3" cols="50" placeholder="Please type here your favorite gender"></textarea>
 		</section>



 		<section class="signInContainer">
 			<label class="request">Favorite books:</label>
 			<textarea class="respons" rows="3" cols="50" placeholder="Book1, Book2, ..."></textarea>
 		</section>

 		<section class="signInContainer">
 			<label class="request">Favorite quote:</label>
 			<textarea class="respons" rows="3" cols="50" placeholder="Enter yout favorite quote here!"></textarea>
 		</section >

 		<div class="termsOfUsecheckBox">
 				<input type="checkbox" name="agreeOrNot" id="termsOfUse">
 				<label for="termsOfUse" class="bookFrame__newUser bookFrame__newUser--signIn">By signing up, I agree to the 
 					<a href="#"  class="bookFrame__newUser bookFrame__newUser--signIn">
 						Terms of use
 					</a>
 				</label>
			</div>

 		<button class="bookFrame__inputText bookFrame__submitButton bookFrame__submitButton_sign2">
 			<a class="removeUnderline" href="../HTML/LogIn">
 				 Sign In
 			</a>
 		</button>
 		
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