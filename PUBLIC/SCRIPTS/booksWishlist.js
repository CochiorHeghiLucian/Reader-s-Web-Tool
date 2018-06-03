function getYourBooks(){
    let mockReq = new XMLHttpRequest();
    mockReq.open('GET', 'http://localhost/ProiectTWTEST/PUBLIC/booxWishlist/populate');

    mockReq.addEventListener('load', function onLoad(){
        let jsonResp = JSON.parse(mockReq.response);
        switch(mockReq.status){
            case 200:
                console.log("Call ajax success!");
                addElementsToYourBoox(jsonResp);
        
                break;
            default:
                console.log("Alte probleme");
                break;
        }
});

mockReq.addEventListener('error', () =>{
console.error("Something failled");
});

mockReq.send();
}

function addElementsToYourBoox(jsonResp){
console.log(jsonResp);
console.log(Object.keys(jsonResp).length);

var mySection = document.getElementById("bookContainer");

//  <div class="container" >
//         	<div class="coverBlockImage" >
//         		<img src="../Images/img1.jpg">
//         	</div>

//         	<div class="descriptionBook">
//         		<h1>Description</h1>
//         		<p>
//         			f dsahfgsadg fsdfgdsagfhgds afgsaffdw tefadsad fdsytsafsd fsdafsad gsaf
//         			dsfda. sdfsadffasdfasd .sdf sdagfag.fdsaf sdf sg..dsfagdsagfadg.sdgasffdg
//         			gdsagasgsd.gsdsadgsad.sagdg  sag sags. gsagsf. fdsgfdsgfsdgfdg  gfafgfdgd
//         			dsafgsdgafdgagfdagadgfagfahdfhghafdgah
//         		</p>
//         	</div>
//             <h1 class="title"> A HIGHER LOYALTY</h1>
//             <button class="button">Remove book</button>
//         </div>
        

for(var i=0; i<Object.keys(jsonResp).length; i++){
//creez div-container
var elemDivContainer = document.createElement("div");
elemDivContainer.setAttribute("class", "container");
elemDivContainer.setAttribute("id", 'container_'+i)

mySection.appendChild(elemDivContainer);

var elem = document.createElement("div");
elem.setAttribute("class", "coverBlockImage");

var image = "";

if(jsonResp[i].image == ""){
    image = "http://localhost/ProiectTWTEST/PUBLIC/IMAGES/noImage.jpg";
}else{
    image = jsonResp[i].image;
}


var imgElem = document.createElement("img");
imgElem.setAttribute("src", image);
elem.appendChild(imgElem);

elemDivContainer.appendChild(elem);

var elemDivDescription = document.createElement("div");
elemDivDescription.setAttribute("class", "descriptionBook");
elemDivContainer.appendChild(elemDivDescription);

var elemH1 = document.createElement("h1");
elemH1.innerHTML = "Description";
elemDivDescription.appendChild(elemH1);

//pregatire descriere;
var vectorCuvinte = jsonResp[i].description.split(" ");
var descriereCarte = "";
for(var j=0;j<= 25;j++){
    if(vectorCuvinte[j] != null)
    descriereCarte = descriereCarte +" "+vectorCuvinte[j];
}

descriereCarte += "...";


var elemParagraf = document.createElement("p");		
elemParagraf.innerHTML = descriereCarte;
elemDivDescription.appendChild(elemParagraf);

var elemH1Title = document.createElement("h1");
elemH1Title.setAttribute("class", "title");
elemH1Title.setAttribute("id", 'title_'+i);
elemH1Title.innerHTML = jsonResp[i].title;
elemDivContainer.appendChild(elemH1Title);

var elemButton = document.createElement("button");
elemButton.setAttribute("class", "button");
elemButton.setAttribute("type", "button");
elemButton.setAttribute("id", 'button_'+i);
elemButton.setAttribute("onclick", 'removeBookByTitle('+'"title_' + i+ '"' +  ', "container_'+ i + '"' +')' );
elemButton.innerHTML = "Remove book";
elemDivContainer.appendChild(elemButton);



}
}

function removeBookByTitle(idTag, idContainer){
var title = document.getElementById(idTag).innerHTML;

console.log(title, idContainer);

let mockReq = new XMLHttpRequest();
mockReq.open('POST', 'http://localhost/ProiectTWTEST/PUBLIC/booxWishlist/deleteBook');

mockReq.addEventListener('load', function onLoad(){


switch(mockReq.status){
    case 200:
        console.log("Call ajax success! [SERVER]"+ mockReq.response);
        deleteElementFromList(idContainer);
        break;
    default:
        break;
}
});

mockReq.addEventListener('error', () => {
console.error("Something is failed!");
});


mockReq.send(title);

}

function deleteElementFromList(idContainer){
console.log("Id container : "+ idContainer);
var container = document.getElementById(idContainer);
container.parentNode.removeChild(container);
}