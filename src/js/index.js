//https://webetu.iutnc.univ-lorraine.fr/www/canals5/phox/doc/
//https://webetu.iutnc.univ-lorraine.fr/www/canals5/phox/api/

import photoloader from "./photoloader.js";
import ui from "./ui.js";


let photo = photoloader.loadPicture(105).then(data => {
    ui.displayPicture(data.photo)
    dataCategorie(data).then(data => {
        ui.displayCategorie(data)
    })
    dataCommentaires(data).then(data => {
        ui.displayComments(data);
    });

});

function getPicture(id){
    photoloader.loadPicture(105).then(data => {
        console.log(data.titre)
        console.log(data.type)
        console.log(data.url);
    });
}


function dataCategorie(dataPicture){
    return photoloader.loadResource(dataPicture.links.categorie.href);
}

function dataCommentaires(dataPicture){
    return photoloader.loadResource(dataPicture.links.comments.href);
}