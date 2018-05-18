<!DOCTYPE html>

<html>

<head>
	<title> BooX SignIn</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="height=device-height, initial-scale=1.0">
	<link rel="stylesheet" href="../../../PUBLIC/CSS/Styles.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="../../../PUBLIC/IMAGES/mediaLogIn.css">
</head>

<body style="background-image:url(../../../PUBLIC/IMAGES/bookshelves-wallpaper-1920x1080.jpg)">

	<div class="bookFrame bookFrame--signIn">
	<p class="frameTitle frameTitle--signIn">Sign In</p>
		<form>
			<input type="text" class="bookFrame__inputText bookFrame__inputText--SignIn" placeholder="First Name">
			<input type="text" class="bookFrame__inputText bookFrame__inputText--SignIn" placeholder="Last Name">
		    <input type="text"  class="bookFrame__inputText bookFrame__inputText--SignIn" placeholder="Nickname">

		    <div class="bookFrame__inputText bookFrame__inputText--SignIn ">
				<input type="radio" name="gender" id="male"><label for="male"> Male </label>
				<input type="radio" name="gender" id="female"><label for="female"> Female</label>
			</div>

 			<input type="date" class="bookFrame__inputText bookFrame__inputText--SignIn">
 			
 			<input type="Phone" class="bookFrame__inputText bookFrame__inputText--SignIn" placeholder="Phone number">
 			<input type="email"  class="bookFrame__inputText bookFrame__inputText--SignIn" placeholder="email">
 			<input type="email"  class="bookFrame__inputText bookFrame__inputText--SignIn" placeholder="Retype email">
 			<input type="password" class="bookFrame__inputText bookFrame__inputText--SignIn" placeholder="Choose password">
 			<input type="password" class="bookFrame__inputText bookFrame__inputText--SignIn" placeholder="Confirm password">

 			<div class="footerSeparator footerSeparator--form footerSeparator--form--SignIn"></div>
 		
 			<input type="text" class="bookFrame__inputText bookFrame__inputText--SignIn" placeholder="Street Address">
 			<input type="text" class="bookFrame__inputText bookFrame__inputText--SignIn" placeholder="Apartment">
 			<input type="text" class="bookFrame__inputText bookFrame__inputText--SignIn" placeholder="Country">
 			<input type="text" class="bookFrame__inputText bookFrame__inputText--SignIn" placeholder="City">
 			<input type="text" class="bookFrame__inputText bookFrame__inputText--SignIn" placeholder="ZIP code">

 			<div class="bookFrame__inputText bookFrame__inputText--SignIn ">
 				 Choose profile image
 				<input type="file" class="bookFrame__inputText__hideFile bookFrame__inputText__hideFile--SignIn">
			</div>
			<div class="bookFrame__inputText bookFrame__inputText--SignIn ">
 				 Choose wallpaper image
 				<input type="file" class="bookFrame__inputText__hideFile bookFrame__inputText__hideFile--SignIn">
			</div>


			<button type="submit" class="bookFrame__inputText bookFrame__inputText--SignIn bookFrame__submitButton_continue bookFrame__submitButton_continue--SignIn "> 
				<a class="removeUnderline" href="SignIn_View2.php">
					Continue registration
				</a
			</button>

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

	 <script src="../../../PUBLIC/JS/SignIn.js"></script>

</body>

</html> 