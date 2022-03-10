import {config} from "./config.js"

function loadResource(){
                    //lien à changer ici
    let pr = fetch(config.Host+config.ApiRootUrl, {
        credentials : 'include'
    }).then(resp => {
        if(resp.ok){
            return resp.json().then(data => {
                return data;
            });
        }
        else Promise.reject(new Error("L'image n'existe pas"));
    }).catch(error => {
        console.log(error);
    });
    return pr;
}


export default {
    loadPicture
}