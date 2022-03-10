<?php
declare(strict_types=1);

namespace custumbox\controller;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

class AffichageController{ /**Classe controleur généralement utiliser pour les affichage */
    private \Slim\Container $container;

    public function __construct(\Slim\Container $container){
        $this->container = $container;
    }
    
    /**Acceuil fait appel à la vue participant qui va afficher l'acceuil */
    public function AfficherAccueil(Request $rq, Response $rs,array $args):Response{
        $vue = new \mywishlist\vue\VueParticipant([],$this->container);
        $html = $vue->render(0) ;
        $rs->getBody()->write($html);
        return $rs;
    }


}