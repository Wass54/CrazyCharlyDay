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

    /** A l'acceuil de la page on vous propose de creer un compte mais bien evidement vous n'Ãªtes pas obliger */
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
 



    public function render($selecteur) /**Cette fonction permet de recuperer les mÃ©thode qui sont en priver Ã  partir des controller */
    {
        switch ($selecteur) {
            case 0:
                {
                    $content = $this->htmlAccueil();
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
    
    
    
    //Créer un document en format json
    private function affichageJSONCategorie(){
        $json= "{\"type\":\"categorie\", \"categories\":[{";
        foreach ($this->tab as $l){
            $json.="\"categorie\": {\"idcateg\":$l[id],\"nom\":\"$l[nom]\"},";
        }
        $json.="}]}";
        return $json;
    }
    
    //Créer un document en format json
    private function affichageJSONUneCategorie(){
        $json= "{";
        $json.= "\"id\":\"".$this->tab["id"]."\",\"nom\":\"".$this->tab["nom"]."\"";        
        $json.="}";
        return $json;
    }
    
    
}