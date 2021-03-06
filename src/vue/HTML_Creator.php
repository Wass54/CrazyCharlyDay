<?php
declare(strict_types = 1);
namespace custumbox\vue;

// Classe permettant d'avoir la meme structure html dans toute les vue
class HTML_Creator
{

    private \Slim\Container $container;

    public array $tab;

    // Constucteur similaire au autre classe vue
    public function __construct(array $tab, \Slim\Container $container)
    {
        $this->tab = $tab;
        $this->container = $container;
    }

    // Methode publique permettant de creer tout un document sous format html, le $content mit en paramettre est place dans le body du document
    public function html_body(string $content): string
    {
        $url_produit = $this->container->router->pathFor('produit');
        $url_accueil = $this->container->router->pathFor('accueil');
        $url_nvxProduit = $this->container->router->pathFor('nouvProduit');
        $url_js = $this->container->router->pathFor('accueil') . "js";
        $url_css = $this->container->router->pathFor('accueil') . "css";
        $html = <<<END
        <!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="utf-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
                <meta name="description" content="" />
                <meta name="author" content="" />
                <title>CustomBox</title>
                <!-- Favicon-->
                <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
                <!-- Bootstrap icons-->
                <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
                <!-- Core theme CSS (includes Bootstrap)-->
                <link href="$url_css/styles.css" rel="stylesheet" />
                <link href="$url_css/stylePerso.css" rel="stylesheet" />
            </head>
            <body>
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container px-4 px-lg-5">
                    <a class="navbar-brand" href="$url_produit">Custombox</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                            <li class="nav-item"><a class="nav-link active" aria-current="page" href="$url_accueil">cat??gorie</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Produits</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="$url_produit">Produits</a></li>
                                    <li><a class="dropdown-item" href="$url_nvxProduit">Nouveau produits</a></li>
                                </ul>
                            </li>
                        </ul>
                        <form class="d-flex">
                            <button class="btn btn-outline-dark" type="submit">
                                <i class="bi-cart-fill me-1"></i>
                                Boxes
                                <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                            </button>
                        </form>
                    </div>
                </div>
            </nav>
            <!-- Header-->
            <header class="bg-dark py-5" style="padding: 50px">
                <div class="container px-4 px-lg-5 my-5">
                    <div class="text-center text-white">
                        <h1 class="display-4 fw-bolder">CustomBox</h1>
                        <p class="lead fw-normal text-white-50 mb-0"></p>
                    </div>
                </div>
            </header>
            <!-- Section-->
            <section class="py-5" style="background: linear-gradient( #47ACA4, #DDC484)">
                <div class="container px-4 px-lg-5 mt-5" >
                    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                            $content
                    </div>
                </div>
            </section>
            <!-- Footer-->
            <footer class="py-5 bg-dark">
                <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
            </footer>
            <!-- Bootstrap core JS-->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
            <!-- Core theme JS-->
        </body>
        </html>
        
        END;
        return $html;
    }

    public function html_pruduct(string $content): string
    {
        $url_produit = $this->container->router->pathFor('produit');
        $url_accueil = $this->container->router->pathFor('accueil');
        $url_nvxProduit = $this->container->router->pathFor('nouvProduit');
        $url_js = $this->container->router->pathFor('accueil') . "js";
        $url_css = $this->container->router->pathFor('accueil') . "css";
        $html = <<<END
        <!DOCTYPE html>
        <html lang="en">
        <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>CustomBox</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="$url_css/styles_p.css" rel="stylesheet" />
        </head>
        <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="$url_accueil">CustomBox</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="$url_accueil">Cat??gorie</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="$url_accueil" role="button" data-bs-toggle="dropdown" aria-expanded="false">Produits</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="$url_produit">Porduits</a></li>
                                <li><a class="dropdown-item" href="$url_nvxProduit">Nouveau produits</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        $content
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts_p.js"></script>
        </body>
        </html>    
        END;
        return $html;
    }
}

