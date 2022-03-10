
import {buildProductsList} from "./ui.js";

let _products = [];

class produit{
    constructor(ref, price){
        this.reference = ref;
        this.price = price;
    }
}

let p = new produit('A111', 3);
let p2 = new produit('A222', 4);
let p3 = new produit('A333', 5);

_products.push(p);
_products.push(p2);
_products.push(p3);

export const init = function(){
  
  buildProductsList(_products); 

}
