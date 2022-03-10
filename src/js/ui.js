function displayProduct(product){
	let structureProduit = `
                        <!-- Sale badge-->
                        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                        <!-- Product image-->
                        <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." style="cursor: pointer;"  onclick="location.href='product.html';"/>
                        <!-- Product details-->
                        <div class="card-body p-4" style="cursor: pointer;"  onclick="location.href='product.html';">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">${product.reference}</h5>
                                <!-- Product reviews-->
                                <div class="d-flex justify-content-center small text-warning mb-2">
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                </div>
                                <!-- Product price-->
                                <span class="text-muted text-decoration-line-through">$20.00</span>
                                ${product.price}
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                        </div>
    `	;

	let element = document.createElement("div");
	element.classList.add('product');
	element.innerHTML = structureProduit;
	return element;

}


export const buildProductsList = function(products){
	let query = document.getElementsById("card h-100");
	query.innerHTML = "";
	for(var i = 0; i < products.length; i++){
        query.appendChild(displayProduct(products[i]));
	}
}





/*
function displayPicture(image){
    let photodiv = document.querySelector("#la_photo");
    photodiv.innerHTML = `
    <img src="https://webetu.iutnc.univ-lorraine.fr/${image.url.href}" alt="marchepas">
  <h4>${image.titre}</h4>
  <p>${image.descr}</p>
  <p>${image.type}, ${image.width} x ${image.height}</p>
  <h4 id="la_categorie"></h4>
  <h4>commentaires : </h4>
  <ul id="les_commentaires">
  </ul>
    `;
}



function displayCategorie(categorie){
    let categorieDiv = document.querySelector("#la_categorie");
    categorieDiv.innerHTML = `categorie : ${categorie.categorie.nom}`
}

function displayComments(comments){
    let commentsDiv = document.querySelector("#les_commentaires");
    comments.comments.forEach(comment => {
        let li = document.createElement("li");
        li.innerText = `(${comment.pseudo})  ${comment.content}`;
        commentsDiv.appendChild(li);
    });
}

export default{
    displayPicture,
    displayCategorie,
    displayComments
}*/
