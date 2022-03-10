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
        $content="<form method='post' action='$url' enctype=\"multipart/form-data\">
            <input type='text' name='titre' placeholder='le titre ici'/>
            <input type='text' name='description' placeholder='la description'/>
            <input type='text' name='categories' placeholder='L id de la categorie'/>
            <input type='text' name='poids' placeholder='Le poids en kg'/>
            <button type='submit'>Créer le produit</button>
           
            <h2>Upload Fichier</h2>
            <label for=\"fileUpload\">Fichier:</label>
            <input type=\"file\" name=\"photo1\" id=\"fileUpload\">
            <input type=\"submit\" name=\"submit\" value=\"Upload\">
            <p><strong>Note:</strong> Seuls les formats .jpg, .jpeg, .jpeg, .gif, .png sont autorisés jusqu'à une taille maximale de 5 Mo.</p>
            </form>
            \n";
        return $content;


    }


    /**Affiche le resultat lorsqu'on cree une liste */
    private function produitCree():string{
        $l = $this->tab[0];
        $content = "<article style='color:black;'>Voici le produit crée : <h6>Titre : $l[titre]; Description : $l[description] Categorie : $l[categorie] Poid :$l[poids]</h6><article/>";
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