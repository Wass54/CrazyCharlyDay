<?php
declare(strict_types = 1);
namespace custumbox\vue;

use custumbox\models\Categorie;

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
    
    
    private function affichage_Produit(): string
    {
        $url_img = $this->container->router->pathFor('accueil') . "images/produits";
        $content = '';
        foreach ($this->tab as $l) {
            $content .= " <div class=\"col mb-5\">
                            <div id=\"card h-100\">
                                <!-- Sale badge-->
                                <div class=\"badge bg-dark text-white position-absolute\" style=\"top: 0.5rem; right: 0.5rem\">Sale</div>
                                <!-- Product image-->
                                <img class=\"card-img-top\" src=\"$url_img/$l[id].jpg\" alt=\"...\" style=\"cursor: pointer;\"  onclick=\"location.href='product.html';\"/>
                                <!-- Product details-->
                                <div class=\"card-body p-4\" style=\"cursor: pointer;\"  onclick=\"location.href='product.html';\">
                                    <div class=\"text-center\">
                                        <!-- Product name-->
                                        <h5 class=\"fw-bolder\">$l[titre]</h5>
                                        <!-- Product reviews-->
                                        <div class=\"d-flex justify-content-center small text-warning mb-2\">
                                            <div class=\"bi-star-fill\"></div>
                                            <div class=\"bi-star-fill\"></div>
                                            <div class=\"bi-star-fill\"></div>
                                            <div class=\"bi-star-fill\"></div>
                                            <div class=\"bi-star-fill\"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class=\"card-footer p-4 pt-0 border-top-0 bg-transparent\">
                                    <div class=\"text-center\"><a class=\"btn btn-outline-dark mt-auto\" href=\"#\">Add to cart</a></div>
                                </div>
                            </div>
                      </div>";         
            
        }
        return  $content;
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
                    $content = $this->affichage_Categorie();
                    break;
                }
            case 2:
                {
                    $content = $this->affichage_Produit();
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