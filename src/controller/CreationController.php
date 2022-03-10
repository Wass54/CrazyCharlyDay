<?php
declare(strict_types = 1);
namespace custumbox\controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use custumbox\models\Boite;
use custumbox\models\Categorie;
use custumbox\models\Produit;

class CreationController /**Classe controleur généralement utiliser pour les creations des affichage */
{
    
    private \Slim\Container $container;
    
    public function __construct(\Slim\Container $container)
    {
        $this->container = $container;
    }
    
    /* -------------AJOUTER UN PRODUIT----------------- */
    
    public function afficherFormProduit(Request $rq, Response $rs, array $args): Response
    {
        $vue = new \custumbox\vue\VueCreation([], $this->container);
        $html = $vue->render(0);
        // $rs->getBody()->write("Liste des listes");
        $rs->getBody()->write($html);
        return $rs;
    }


        /**Formulaire du produit */
    public function traiterFormProduit(Request $rq, Response $rs, array $args): Response
    {
        $data = $rq->getParsedBody();
        $titre = filter_var($data['titre'], FILTER_SANITIZE_STRING);
        $description = filter_var($data['description'], FILTER_SANITIZE_STRING);
        $categories = filter_var($data['categories'], FILTER_SANITIZE_STRING);
        $poids = filter_var($data['poids'], FILTER_SANITIZE_STRING);
        $produit = new Produit();
        $produit->titre = $titre;
        $produit->description = $description;
        $produit->categorie = $categories;
        $produit->poids = $poids;
        $produit->save();
        $vue = new \custumbox\vue\VueCreation([
            $produit->toArray()
        ], $this->container);
        $html = $vue->render(1);
        $rs->getBody()->write($html);
        return $rs;
    }
    

}