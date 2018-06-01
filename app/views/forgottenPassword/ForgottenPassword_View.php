<!DOCTYPE html>

<html>

<head>
	<title> Forgotten password </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="height=device-height, initial-scale=1.0">
	<link rel="stylesheet" href="http://localhost/ProiectTWTEST/PUBLIC/CSS/Styles.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="http://localhost/ProiectTWTEST/PUBLIC/CSS/mediaLogIn.css">
</head>

<body style="background-image:url(http://localhost/ProiectTWTEST/PUBLIC/IMAGES/bookshelves-wallpaper-1920x1080.jpg); background-repeat: no-repeat;">
 	<div class="bookFrame-recover">
 		<p class="frameTitle frameTitle--recover"> Recover your BooX password </p>
 		<form action="http://localhost/ProiectTWTEST/PUBLIC/forgottenPassword" method="POST">
 			<input name="email" type="email" placeholder="email address" class="bookFrame__inputText" required>
			 
			 <!-- The php code is executed if the email address inserted
			 for the password recovery could not be found in the DB: -->
			
			<?php if(isset($data['error']) && $data['error'] == "invalidEmail"){
				echo '<p class="logInError">Email address not recognized.</p>';}
			?>

			 <input name="submit" type="submit" value="Recover password" class="bookFrame__submitButton bookFrame__submitButton--recover">
			 <p class="bookFrame__newUser"> Back to <a href="http://localhost/ProiectTWTEST/PUBLIC/login" style="color:white">Log In</a></p>
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