<?php
declare(strict_types=1);

namespace custumbox\controller;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \custumbox\models\Categorie;
use custumbox\models\Produit;

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
    
    
    // pour afficher les produit
    public function afficherProduit(Request $rq, Response $rs,array $args):Response{
        $produit = Produit::all();
        $vue = new \custumbox\vue\VueParticipant($produit->toArray(),$this->container);
        $html = $vue->render(2);
        $rs->getBody()->write($html);
        return $rs;
    }
    
    // pour afficher un produit specifique
    public function afficherUnProduit(Request $rq, Response $rs,array $args):Response{
        $produit = Produit::where('id', '=', $args["id"])->first();
        $produits = Produit::all();
        $vue = new \custumbox\vue\VueParticipant([$produit->toArray(), $produits->toArray()],$this->container);
        $html = $vue->renderProduct(1);
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

    
    
    
    public function afficherUneCategorieJSON(Request $rq, Response $rs, array $args): Response
    {
        $categorie = Categorie::where("id", "=", $args['idcateg'])->first();
        $vue = new \custumbox\vue\VueParticipant($categorie->toArray(), $this->container);
        $html = $vue->renderJSON(1);
        $rs->getBody()->write($html);
        return $rs;
    }


}