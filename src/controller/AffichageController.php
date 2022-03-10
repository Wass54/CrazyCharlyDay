<?php
declare(strict_types=1);

namespace custumbox\controller;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \custumbox\models\Categorie;

class AffichageController{ /**Classe controleur généralement utiliser pour les affichage */
    private \Slim\Container $container;

    public function __construct(\Slim\Container $container){
        $this->container = $container;
    }
    
    /**Acceuil fait appel à la vue participant qui va afficher l'acceuil */
    public function AfficherAccueil(Request $rq, Response $rs,array $args):Response{
        $categorie = Categorie::all();
        $vue = new \custumbox\vue\VueParticipant($categorie->toArray(),$this->container);
        $html = $vue->render(0) ;
        $rs->getBody()->write($html);
        return $rs;
    }
    
    
    // pour afficher les categorie
    public function afficherCategorie(Request $rq, Response $rs,array $args):Response{
        $categorie = Categorie::all();
        $vue = new \custumbox\vue\VueParticipant($categorie->toArray(),$this->container);
        $html = $vue->render(1);
        $rs->getBody()->write($html);
        return $rs;
    }
    
    
    
    public function afficherCategorieJSON(Request $rq, Response $rs, array $args): Response
    {
        $categorie = Categorie::all();
        $vue = new \custumbox\vue\VueParticipant($categorie->toArray(), $this->container);
        $html = $vue->renderJSON(0);
        $rs->getBody()->write($html);
        return $rs;
    }


    // public function afficherDetails(Request $rq, Response $rs, array $args) : Response{
        
    // }
    


}