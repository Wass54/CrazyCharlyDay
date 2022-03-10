import {config} from "./config.js";

let photos ="/photos"

const loadCateg = (idCateg) => {
    return loadResource(config.photoboxHost + config.photoboxApiRootUrl+photos+"/"+idCateg)
}




const loadResource = (uri) => {
    return fetch (uri, {credentials: 'include'
})
.then(response =>{
    if(response.ok) return response.json();
    console.log('response error: '+ response.status)
    return Promise.reject(new Error( response.statusText))
})
.catch(error=>{
    console.log('Une erreur :'+error);
} )
}

export default {
    loadPicture
}