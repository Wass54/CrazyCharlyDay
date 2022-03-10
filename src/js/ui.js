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
}
