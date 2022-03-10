<?php
declare(strict_types=1);
namespace mywishlist\vue;
// Classe permettant d'avoir la meme structure html dans toute les vue 
class HTML_Creator{

    private \Slim\Container $container;
    public array $tab;
    
    // Constucteur similaire au autre classe vue 
    public function __construct(array $tab, \Slim\Container $container)
    {
        $this->tab = $tab;
        $this->container = $container;
    }
    
    // Methode publique permettant de creer tout un document sous format html, le $content mit en paramettre est place dans le body du document 
    public function html_body(string $content): string{

        $url_accueil = $this->container->router->pathFor('accueil');
        $html = <<<END
        <!DOCTYPE html>
        <html>
        <html lang="fr">
            <head>
                <meta charset="utf-8" />
                <link rel="stylesheet" href="$url_accueil/css/index.css" />
                <link rel="stylesheet" href="$url_accueil/css/menu_deroulant.css" />
                <link rel="stylesheet" href="$url_accueil/css/header.css" />
                <link rel="stylesheet" href="$url_accueil/css/index_media.css" />
                <title>Page d'Accueil</title>
            </head>
            <body>
                <header>
            	<nav>
            		<ul>
            			<li><a href="#"><img class="logo" src='#'></a></li>
            			<li class="menu"><a href="#">#</a>
                            <ul class="submenu">
                               <li><a href='#'>#</a></li>
                               <li><a href='#'>#</a></li>
                               <li><a href='#'>#</a></li>
                            </ul>
                        </li>
                        <li class="menu"><a href="#">#</a></li>
                        <li class="menu"><a href="#">#</a></li>
                        <li class="menu"><a href="#">#</a></li>
            		</ul>
            	</nav>
            </header>
                <div class="content">
                $content
                </div>
            </body>
        </html>
        END;
                return $html;
    }
}

