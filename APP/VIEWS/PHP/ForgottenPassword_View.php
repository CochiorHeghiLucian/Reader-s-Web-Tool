<!DOCTYPE html>

<html>

<head>
	<title> Forgotten password </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="height=device-height, initial-scale=1.0">
	<link rel="stylesheet" href="../../../PUBLIC/CSS/Styles.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="../../../PUBLIC/CSS/mediaLogIn.css">
</head>

<body style="background-image:url(../../../PUBLIC/IMAGES/bookshelves-wallpaper-1920x1080.jpg)">
 	<div class="bookFrame-recover">
 		<p class="frameTitle frameTitle--recover"> Recover your BooX password </p>
 		<form action="../../CONTROLLERS/forgottenPassword_Controller.php" method="POST">
 			<input name="email" type="text" placeholder="email or username" class="bookFrame__inputText" required>
 			<input name="submit" type="submit" value="Recover password" class="bookFrame__submitButton bookFrame__submitButton--recover">
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