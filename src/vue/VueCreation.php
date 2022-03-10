<?php
declare(strict_types=1);

namespace custumbox\vue;

class VueCreation{

    private \Slim\Container $container;
    public array $tab;

    public function __construct(array $tab,\Slim\Container $container){
        $this->tab = $tab;
        $this->container=$container;
    }


    private function formulaireProduit():string{
        $url = $this->container->router->pathFor('nvxProduits');
        $content="<form method='post' action='$url'>
            <input type='text' name='titre' placeholder='le titre ici'/>
            <input type='text' name='description' placeholder='la description'/>
            <input type='date' name='categories' placeholder='La categorie'/>
            <input type='date' name='poids' placeholder='Le poids en kg'/>
            <button type='submit'>Créer le produit</button>
            </form>\n";
        return $content;
    }


    /**Affiche le resultat lorsqu'on cree une liste */
    private function produitCree():string{
        var_dump($tab[0]);
        $l = $this->tab[0];
        $content = "<article style='color:white;'>Voici le produit crée : <h5>$l[titre];$l[description];$l[categories];$l[poids];</h5> <article/>";
        return $content;
    }


    public function render($selecteur) { /**Cette fonction permet de recuperer les méthode qui sont en priver à partir des controller */
        switch ($selecteur) {

            case 0 : {
                $content = $this->formulaireProduit();
                break;
            }
            case 1 : {
                $content = $this->produitCree();
                break;
            }
        }
        $creator = new HTML_Creator($this->tab,$this->container);
        $html = $creator->html_body($content);
        return $html;
    }
}