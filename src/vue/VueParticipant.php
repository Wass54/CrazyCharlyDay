<?php
declare(strict_types = 1);
namespace custumbox\vue;

/**La classe VueParticipant est la classe qui affiche le plus sur le site  */
class VueParticipant
{

    private \Slim\Container $container;

    public array $tab; // c'est le tableau 

    public function __construct(array $tab, \Slim\Container $container)
    {
        $this->tab = $tab;
        $this->container = $container;
    }

    /** A l'acceuil de la page on vous propose de creer un compte mais bien evidement vous n'êtes pas obliger */
    private function htmlAccueil(): string
    {
        $content = "Bienvenue dans custumbox <br>";
        foreach ($this->tab as $l) {
            $content .= "<div class=\"categorie\">ID Categ: $l[id]  Nom : $l[nom]<br></div>\n";
        }
        return $content;
    }

    private function affichage_Categorie(): string
    {
        $content = '';
        foreach ($this->tab as $l) {
                $content .= "<div class=\"categorie\">ID Categ: $l[id]  Nom : $l[nom] - <br></div>\n";
            }
        return "<section>" . $content . "</section>";
    }
 

    private function affichage_Details(){
        $content = "        
        <section class=\"py-5\">
        <div class=\"container px-4 px-lg-5 my-5\">
            <div class=\"row gx-4 gx-lg-5 align-items-center\">
                <div class=\"col-md-6\"><img class=\"card-img-top mb-5 mb-md-0\" src=\"https://dummyimage.com/600x700/dee2e6/6c757d.jpg\" alt=\"...\" /></div>
                <div class=\"col-md-6\">
                    <div class=\"small mb-1\">SKU: BST-498</div>
                    <h1 class=\"display-5 fw-bolder\">Shop item template</h1>
                    <div class=\"fs-5 mb-5\">
                        <span class=\"text-decoration-line-through\">$45.00</span>
                        <span>$40.00</span>
                    </div>
                    <p class=\"lead\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium at dolorem quidem modi. Nam sequi consequatur obcaecati excepturi alias magni, accusamus eius blanditiis delectus ipsam minima ea iste laborum vero?</p>
                    <div class=\"d-flex\">
                        <input class=\"form-control text-center me-3\" id=\"inputQuantity\" type=\"num\" value=\"1\" style=\"max-width: 3rem\" />
                        <button class=\"btn btn-outline-dark flex-shrink-0\" type=\"button\">
                            <i class=\"bi-cart-fill me-1\"></i>
                            Add to cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>";
    return $content;


    }


    public function render($selecteur) /**Cette fonction permet de recuperer les méthode qui sont en priver à partir des controller */
    {
        switch ($selecteur) {
            case 0:
                {
                    $content = $this->htmlAccueil();
                    break;
                }
            case 1:
                {
                    $content = $this->affichage_Details();
                    break;
                }
        }
        $creator = new HTML_Creator($this->tab, $this->container);
        $html = $creator->html_body($content);
        return $html;
    }
    
    
    
    public function renderJSON($selecteur)
    {
        $json = "";
        switch ($selecteur) {
            case 0:
                {
                    $json = $this->affichageJSONCategorie();
                    break;
                }
            case 1:
                {
                    $json = $this->affichageJSONUneCategorie();
                    break;
                }
        }
        return $json;
    }
    
    
    
    //Cr�er un document en format json
    private function affichageJSONCategorie(){
        $json= "{\"type\":\"categorie\", \"categories\":[{";
        foreach ($this->tab as $l){
            $json.="\"categorie\": {\"idcateg\":$l[id],\"nom\":\"$l[nom]\"},";
        }
        $json.="}]}";
        return $json;
    }
    
    //Cr�er un document en format json
    private function affichageJSONUneCategorie(){
        $json= "{";
        $json.= "\"id\":\"".$this->tab["id"]."\",\"nom\":\"".$this->tab["nom"]."\"";        
        $json.="}";
        return $json;
    }
    
    

    
}