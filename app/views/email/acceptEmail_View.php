<!DOCTYPE html>

<html>

<head>
	<title> Accept Exchange</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="height=device-height, initial-scale=1.0">
	<link rel="stylesheet" href="http://localhost/ProiectTWTEST/PUBLIC/CSS/Styles.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="http://localhost/ProiectTWTEST/PUBLIC/CSS/mediaLogIn.css">
</head>

<body style="background-image:url(http://localhost/ProiectTWTEST/PUBLIC/IMAGES/bookshelves-wallpaper-1920x1080.jpg); background-repeat: no-repeat;">

    <?php   
            if(isset($data['info'])) {
                echo '<p class="logInError">'.$data['info'].'</p>';
            }
	?>

</body>

</html> 