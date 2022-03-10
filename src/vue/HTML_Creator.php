<?php
declare(strict_types=1);
namespace custumbox\vue;
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
                <title>Page d'Accueil</title>
            </head>
            <body>
                <header>
            	<nav>
            		<ul>
            			<li><a href="$url_accueil"><img class="logo" src='{$url_accueil}/images/logoatelier.png'></a></li>
            			<li class="menu"><a href="#">#</a>
                            <ul class="submenu">
                               <li><a href='#'>#</a></li>
                               <li><a href='#'>#</a></li>
                               <li><a href='#'>ABABA</a></li>
                            </ul>
                        </li>
                        <li class="menu"><a href="#">#</a></li>
                        <li class="menu"><a href="#">#</a></li>
                        <li class="menu"><a href="#">#</a></li>
            		</ul>
            	</nav>
            </header>
                <input type="text" id="product-search" placeholder="Rechercher un produit" />
                <div class="content">
                $content
                </div>
            </body>
        </html>
        END;
                return $html;
    }
}

