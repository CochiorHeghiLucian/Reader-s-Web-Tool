<!DOCTYPE html>

<html>

<head>
	<title> BooX LogIn</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="height=device-height, initial-scale=1.0">
	<link rel="stylesheet" href="http://localhost/ProiectTWTEST/PUBLIC/CSS/Styles.css">
	
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="~/../../PUBLIC/CSS/mediaLogIn.css">
</head>

<body style="background-image:url(http://localhost/ProiectTWTEST/PUBLIC/IMAGES/bookshelves-wallpaper-1920x1080.jpg); background-repeat: no-repeat;">
	<div class="bookFrame bookFrame--logIn">	
		<p class="frameTitle frameTitle--logIn">Log In</p> 
		<form action="../public/index.php" method="POST">
 			<input name="email" type="email" placeholder="email address" class="bookFrame__inputText" required>
 			<input name="password" type="password" placeholder="password" class="bookFrame__inputText" required>
			 
			<!-- The php code is executed if the email 
			address inserted could not be found in the DB: -->
			
			<?php if(isset($data['error']) && $data['error'] == "invalidEmail"){
				echo '<p class="logInError">Email address not recognized.</p>';}
			?>
				
			<!-- The php code is executed if the email address inserted
			exists in the DB, but the inserted password is not the one that
			corresponds in the DB to inserted email address: -->
			
			<?php if(isset($data['error']) && $data['error'] == "invalidPassword"){
				echo '<p class="logInError">Error logging in. Please try again.</p>';}
			?> 
				
			<input name="submit" type="submit" value="Log In" class="bookFrame__submitButton">

			<p class="bookFrame__newUser"> Forgotten <a href="ForgottenPassword_View.php" style="color:white">password?</a></p>
 			<p class="bookFrame__newUser"> New BooX user? Click <a href="SignIn_View.php" style="color:white">here!</a></p>
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