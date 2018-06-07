<!DOCTYPE html>

<html>

<head>
	<title> Change password </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="height=device-height, initial-scale=1.0">
	<link rel="stylesheet" href="http://localhost/ProiectTWTEST/PUBLIC/CSS/Styles.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="http://localhost/ProiectTWTEST/PUBLIC/CSS/mediaLogIn.css">
	<script type="text/javascript" src="http://localhost/ProiectTWTEST/PUBLIC/SCRIPTS/changePassword.js"></script>
</head>

<body style="background-image:url(http://localhost/ProiectTWTEST/PUBLIC/IMAGES/bookshelves-wallpaper-1920x1080.jpg); background-repeat: no-repeat;">
 	<div class="bookFrame-recover">
 		<p class="frameTitle frameTitle--recover"> Change your BooX password </p>
 		<form onsubmit="checkFormInput(); return false;">
		 	<p class="signInErrorMessage" name="serverMessage"></p>
			<input name="email" type="email" placeholder="Email" class="bookFrame__inputText" required /> 
 			<input name="password" type="password" placeholder="New password" class="bookFrame__inputText" required />
            <input name="retypePassword" type="password" placeholder="Confirm new password" class="bookFrame__inputText" required />
			<input name="submit" type="submit" value="Change password" class="bookFrame__submitButton bookFrame__submitButton--recover" />
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