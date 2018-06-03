<!DOCTYPE html>

<html>

<head>
	<title> Lend book </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="height=device-height, initial-scale=1.0">
	<link rel="stylesheet" href="~/../../PUBLIC/CSS/Styles.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href=".~/../../PUBLIC/CSS/mediaLogIn.css">
</head>

<body>
	<nav class="headerNavigator">
		<ul class="headerNavigator__ul">
			<li class="headerNavigator__ul__li"><a class="headerNavigator__ul__li__a" href="http://localhost/ProiectTWTEST/PUBLIC/yourBoox"> Your booX </a></li>
			<li class="headerNavigator__ul__li"><a class="headerNavigator__ul__li__a" href="http://localhost/ProiectTWTEST/PUBLIC/booxWishlist"> BooX Wishlist </a></li>
			<li class="headerNavigator__ul__li headerNavigator__ul__logOut"><a class="headerNavigator__ul__li__a" href="../HTML/LogIn"> Log Out </a></li>
			<li class="headerNavigator__ul__li headerNavigator__ul__logOut ">
				<a class="headerNavigator__ul__li__a headerNavigator__ul__li__a--home headerNavigator__ul__home " href="http://localhost/ProiectTWTEST/PUBLIC/profile">
					<i class="fa fa-home" style="font-size:23px;color:#A40A3C"></i>
					Home 
				</a>
			</li>
		</ul>
		
 	</nav>

 	<form class="aboutUser__tab aboutUser__tab--LendBook">
 			<input class="respons respons--lendBook" type="text" placeholder="Book title" id="title"></input>
 			<input class="respons respons--lendBook" type="text" placeholder="Book author" id="author"></input>
 			<input class="respons respons--lendBook" type="text" placeholder="Book genre" id="description"></input>
 			<button type="button" class="bookFrame__submitButton bookFrame__submitButton--YourBooXAddBook" onclick="getBookInformationFromUser('title', 'author', 'description')">
 				 Add book 
 			</button>
 	</form>

	<span class="" id="errorMessage">  </span>

	<div id="test">

	</div>


 	<footer class="footerSeparatorLendBook">
 		<ul class="footerSeparator__ul">
 			<li class="footerSeparator__ul__li">
 				&copy; 2018 BooX 
 			</li>
  		</ul>
 	</footer>
</body>

<script>
	function getBookInformationFromUser(title, author, description){
		var bookTitle, bookAuthor, bookDescription;

		bookTitle = document.getElementById(title).value;
		bookAuthor = document.getElementById(author).value;
		bookDescription = document.getElementById(description).value;
		console.log(bookTitle+" "+bookAuthor + bookDescription);

		if((bookTitle != null && bookTitle != "") && (bookAuthor != null && bookAuthor != "") && (bookDescription != null && bookDescription != "")){
			getBookFromGoogleAPI(bookTitle+" "+bookAuthor, bookDescription);
		}else{
			document.getElementById("errorMessage").innerHTML = "Va rugam completati toate datele necesare apoi reveniti";
		}

		
	}


	function getBookFromGoogleAPI(querry, userStatus){
	let mockReq = new XMLHttpRequest();
	
    mockReq.open('GET', 'https://www.googleapis.com/books/v1/volumes?q='+querry);

    mockReq.addEventListener('load', function onLoad(){
		let jsonResp = JSON.parse(mockReq.response);
		
        switch(mockReq.status){
            case 200:
                console.log("Call ajax success!");
                prepareDataToSendToServer(jsonResp, userStatus);                
                break;
            default:
				console.log("Alte probleme");
				return "error";
                break;
        }
    });

    mockReq.addEventListener('error', () =>{
        console.error("Something failled");
    });

    mockReq.send();
}


function prepareDataToSendToServer (jsonResp, userStatus){
	//console.log(jsonResp);
	var bookTitle = jsonResp.items[0].volumeInfo['title'];
	var bookAuthor="";
	var noPages = jsonResp.items[0].volumeInfo['pageCount'];
	var description = jsonResp.items[0].volumeInfo['description'];
	
	if(imageLink == null){
		imageLink = "";
	}

	if(noPages == null){
		noPages = 0;
	}

	if(description == null){
		description = "No description found for this book";
	}

	for(var i=0;i<jsonResp.items[0].volumeInfo['authors'].length;i++){
		bookAuthor += jsonResp.items[0].volumeInfo['authors'][i] + ",";
	}

	bookAuthor = bookAuthor.substr(0,bookAuthor.length-1);
	var imageLink = "";
	if(jsonResp.items[0].volumeInfo.hasOwnProperty('imageLinks')){
	    imageLink = jsonResp.items[0].volumeInfo['imageLinks'].thumbnail;
		document.getElementById("test").innerHTML = '<img src='+imageLink+'/>';
	}
	

	console.log(bookTitle+" -> "+ bookAuthor+" -> "+ noPages + " -> "+description+ " -> "+imageLink);
	sendDataToServer(bookTitle, bookAuthor, noPages, description, imageLink, userStatus);
}

function sendDataToServer(bookTitle, bookAuthor, noPages, description, imageLink, userStatus){
	let mockReq = new XMLHttpRequest();
	mockReq.open('POST', 'http://localhost/ProiectTWTEST/PUBLIC/addBookToWishlist/updateUserDB');

	mockReq.addEventListener('load', function onLoad(){
		//let jsonResp = JSON.parse(mockReq.response);

		switch(mockReq.status){
			case 200:
				console.log("Call ajax success! [SERVER]"+ mockReq.response);
				dispayMessage(mockReq.response);
				break;
			default:
				break;
		}
	});

	mockReq.addEventListener('error', () => {
		console.error("Something is failed!");
	});

	let payload = {
		"title" : bookTitle,
		"author" : bookAuthor,
		"noPages" : noPages,
		"description" : description,
		"imageLink" : imageLink,
		"userStatus" : userStatus
	}

	mockReq.send(JSON.stringify(payload));

}

function dispayMessage(msg){
	if(msg == "inserareReusita"){
		document.getElementById("errorMessage").innerHTML = "Carte s-a inserat cu succes";
	}else if(msg == "duplicat"){
		document.getElementById("errorMessage").innerHTML = "Cartea pe care se doreste a se insera exista deja in lista dumneavoastra!";
	}else{
		document.getElementById("errorMessage").innerHTML = "A aprut o eroare la Baza de date, incercati din nou mai tariu";
	}
}

</script>

</html> 