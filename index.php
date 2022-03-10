<?php
declare(strict_types = 1);
require 'vendor/autoload.php';
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
session_start();
$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
        'dbconf' => '/conf/db.conf.ini'
    ]
];
$c = new \Slim\Container($configuration);
$app = new \Slim\App($c);
use Illuminate\Database\Capsule\Manager as DB;
$db = new DB();
$db->addConnection(parse_ini_file('src/conf/conf.ini'));
$db->setAsGlobal();
$db->bootEloquent();

/**
 * Acceuil
 */
$app->get('/', \custumbox\controller\AffichageController::class . ':afficherAccueil')->SetName('accueil');

$app->get('/categorie/', \custumbox\controller\AffichageController::class . ':afficherCategorie')->SetName('categ');

$app->get('/produit/', \custumbox\controller\AffichageController::class . ':afficherProduit')->SetName('produit');

$app->get('/categorieJSON/', \custumbox\controller\AffichageController::class . ':afficherCategorieJSON')->SetName('categJSON');

$app->get('/categorieJSON/{idcateg}/', \custumbox\controller\AffichageController::class . ':afficherUneCategorieJSON')->SetName('categJSON');

$app->get('/details/', \custumbox\controller\AffichageController::class . ':afficherDetails')->SetName('detail');

/* Crée une liste */
$app->get('/newProduct/', \custumbox\controller\CreationController::class . ':afficherFormProduit')->setName('nouvProduit');

$app->post('/newProduct/', \custumbox\controller\CreationController::class . ':traiterFormProduit')->setName('nvxProduits');
// $app->get('/nouveauProduit',\custumbox\controller\AffichageController::class.':affichage_NouveauProduit')->SetName('nvxProduits');



$app->get('/produit/{id}', function (Request $rq, Response $rs, array $args): Response {
    $c = new custumbox\controller\AffichageController($this);
    return $c->afficherUnProduit($rq, $rs, $args);
})
    ->setName('affUnItem_edition');

$app->run();







