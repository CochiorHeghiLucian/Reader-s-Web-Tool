<!DOCTYPE html>

<html>

<head>
	<title> Lend book </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="height=device-height, initial-scale=1.0">
	<link rel="stylesheet" href="~/../../PUBLIC/CSS/Styles.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="~/../../PUBLIC/CSS/mediaLogIn.css">
</head>

<body>
	<nav class="headerNavigator">
		<ul class="headerNavigator__ul">
			<li class="headerNavigator__ul__li"><a class="headerNavigator__ul__li__a" href="../HTML/YourBooks"> Your booX </a></li>
			<li class="headerNavigator__ul__li"><a class="headerNavigator__ul__li__a" href="../HTML/WishListBooks"> BooX Wishlist </a></li>
			<li class="headerNavigator__ul__li headerNavigator__ul__logOut"><a class="headerNavigator__ul__li__a" href="../HTML/LogIn"> Log Out </a></li>
			<li class="headerNavigator__ul__li headerNavigator__ul__logOut ">
				<a class="headerNavigator__ul__li__a headerNavigator__ul__li__a--home headerNavigator__ul__home " href="../HTML/PersonalInfo">
					<i class="fa fa-home" style="font-size:23px;color:#A40A3C"></i>
					Home 
				</a>
			</li>
		</ul>
		
 	</nav>

 	<form class="aboutUser__tab aboutUser__tab--LendBook">
 			<input class="respons respons--lendBook" type="text" placeholder="Book title" id="title"></input>
 			<input class="respons respons--lendBook" type="text" placeholder="Book author" id="author"></input>
 			<textarea class="respons respons--lendBook" type="text" placeholder="Book status" id="description"></textarea>
 			<button type="button" class="bookFrame__submitButton bookFrame__submitButton--YourBooXAddBook" onclick="getBookInformationFromUser('title', 'author', 'description')">
 				Add book 
 			</button>
 	</form>
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

		//console.log(bookTitle+" "+bookAuthor);
		getBookFromGoogleAPI(bookTitle+" "+bookAuthor, bookDescription);

		
	}


	function getBookFromGoogleAPI(querry, userStatus){
	let mockReq = new XMLHttpRequest();
	
    mockReq.open('GET', 'https://www.googleapis.com/books/v1/volumes?q='+querry);

    mockReq.addEventListener('load', function onLoad(){
		let jsonResp = JSON.parse(mockReq.response);
		
        switch(mockReq.status){
            case 200:
                console.log("Call ajax success!");
                sentBookDataToServer(jsonResp, userStatus);                
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


function sentBookDataToServer (jsonResp, userStatus){
	//console.log(jsonResp);
	var bookTitle = jsonResp.items[0].volumeInfo['title'];
	var bookAuthor="";
	var noPages = jsonResp.items[0].volumeInfo['pageCount'];
	var description = jsonResp.items[0].volumeInfo['description'];

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

	//console.log(bookTitle+" -> "+ bookAuthor+" -> "+ noPages + " -> "+description + " -> "+userStatus);
}


</script>

</html> 