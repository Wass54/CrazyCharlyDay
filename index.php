<?php
declare(strict_types=1);
require 'vendor/autoload.php';
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
session_start();
$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
        'dbconf' => '/conf/db.conf.ini' ]
];
$c = new \Slim\Container($configuration);
$app = new \Slim\App($c);
use Illuminate\Database\Capsule\Manager as DB;
$db = new DB();
$db->addConnection(parse_ini_file('src/conf/conf.ini'));
$db->setAsGlobal();
$db->bootEloquent();


/**Acceuil */
$app->get('/',\mywishlist\controller\AffichageController::class.':afficherAccueil')->SetName('accueil');

   
   
$app->run();







