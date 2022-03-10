<?php
declare(strict_types = 1);
namespace custumbox\vue;

use custumbox\models\Categorie;

/**
 * La classe VueParticipant est la classe qui affiche le plus sur le site
 */
class VueParticipant
{

    private \Slim\Container $container;

    public array $tab;

    // c'est le tableau
    public function __construct(array $tab, \Slim\Container $container)
    {
        $this->tab = $tab;
        $this->container = $container;
    }

    /**
     * A l'acceuil de la page on vous propose de creer un compte mais bien evidement vous n'êtes pas obliger
     */
    private function htmlAccueil(): string
    {
        $content = "Bienvenue dans custumbox <br>";
        foreach ($this->tab as $l) {
            $content .= "<div class=\"categorie\">ID Categ: $l[id]  Nom : $l[nom]<br></div>\n";
        }
        return $content;
    }

    private function affichage_Categorie(): string
    {
        $content = '';
        foreach ($this->tab as $l) {
            $content .= "<div class=\"categorie\">ID Categ: $l[id]  Nom : $l[nom] - <br></div>\n";
        }
        return "<section>" . $content . "</section>";
    }

    private function affichage_Produit(): string
    {
        $url_img = $this->container->router->pathFor('accueil') . "images/produits";

        $content = '';
        foreach ($this->tab as $l) {
            $urlProduit = $this->container->router->pathFor('affUnItem_edition', [
                'id' => $l['id']
            ]);
            $content .= " <div class=\"col mb-5\">
                            <div id=\"card h-100\" style=\"background-color:#98C8C4; padding: 4px\">
                                <!-- Sale badge-->
                                <div class=\"badge bg-dark text-white position-absolute\" style=\"top: 0.5rem; right: 0.5rem\">Sale</div>
                                <!-- Product image-->
                                <img class=\"card-img-top\" src=\"$url_img/$l[id].jpg\" alt=\"...\" style=\"cursor: pointer;\"  onclick=\"location.href='$urlProduit';\"/>
                                <!-- Product details-->
                                <div class=\"card-body p-4\" style=\"cursor: pointer;\"  onclick=\"location.href='product.html';\">
                                    <div class=\"text-center\">
                                        <!-- Product name-->
                                        <h5 class=\"fw-bolder\">$l[titre]</h5>
                                        <!-- Product reviews-->
                                        <div class=\"d-flex justify-content-center small text-warning mb-2\">
                                            <div class=\"bi-star-fill\"></div>
                                            <div class=\"bi-star-fill\"></div>
                                            <div class=\"bi-star-fill\"></div>
                                            <div class=\"bi-star-fill\"></div>
                                            <div class=\"bi-star-fill\"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class=\"card-footer p-4 pt-0 border-top-0 bg-transparent\">
                                    <div class=\"text-center\"><a class=\"btn btn-outline-dark mt-auto\" href=\"#\">Add to cart</a></div>
                                </div>
                            </div>
                      </div>";
        }
        return $content;
    }

    private function affichageUnProduit(): string
    {
        $url_img = $this->container->router->pathFor('accueil') . "images/produits";
        shuffle($this->tab[1]);
        $content = "<!-- Product section-->
<section class=\"py-5\">
    <div class=\"container px-4 px-lg-5 my-5\">
        <div class=\"row gx-4 gx-lg-5 align-items-center\">
            <div class=\"col-md-6\"><img class=\"card-img-top mb-5 mb-md-0\" src=\"$url_img/".$this->tab[0]["id"].".jpg\" alt=\"...\" /></div>
            <div class=\"col-md-6\">
                <div class=\"small mb-1\">ID Produit: ".$this->tab[0]["id"]."</div>
                <h1 class=\"display-5 fw-bolder\">".$this->tab[0]["titre"]."</h1>
                <div class=\"fs-5 mb-5\">
                    <span>Poid: ".$this->tab[0]["poids"]." kilos</span>
                </div>
                <p class=\"lead\">".$this->tab[0]["description"]."</p>
                <div class=\"d-flex\">
                    <input class=\"form-control text-center me-3\" id=\"inputQuantity\" type=\"num\" value=\"1\" style=\"max-width: 3rem\" />
                    <button class=\"btn btn-outline-dark flex-shrink-0\" type=\"button\">
                        <i class=\"bi-cart-fill me-1\"></i>
                        Add to cart
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Related items section-->
<section class=\"py-5 bg-light\">
    <div class=\"container px-4 px-lg-5 mt-5\">
        <h2 class=\"fw-bolder mb-4\">Related products</h2>
        <div class=\"row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center\">
            <div class=\"col mb-5\">
                <div class=\"card h-100\">
                    <!-- Product image-->
                    <img class=\"card-img-top\" src=\"$url_img/".$this->tab[1][0]["id"].".jpg\" alt=\"...\" />
                    <!-- Product details-->
                    <div class=\"card-body p-4\">
                        <div class=\"text-center\">
                            <!-- Product name-->
                            <h5 class=\"fw-bolder\">".$this->tab[1][0]["titre"]."</h5>
                            <!-- Product price-->
                            $40.00 - $80.00
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class=\"card-footer p-4 pt-0 border-top-0 bg-transparent\">
                        <div class=\"text-center\"><a class=\"btn btn-outline-dark mt-auto\" href=\"#\">View options</a></div>
                    </div>
                </div>
            </div>
            <div class=\"col mb-5\">
                <div class=\"card h-100\">
                    <!-- Sale badge-->
                    <div class=\"badge bg-dark text-white position-absolute\" style=\"top: 0.5rem; right: 0.5rem\">Sale</div>
                    <!-- Product image-->
                    <img class=\"card-img-top\" src=\"$url_img/".$this->tab[1][1]["id"].".jpg\" alt=\"...\" />
                    <!-- Product details-->
                    <div class=\"card-body p-4\">
                        <div class=\"text-center\">
                            <!-- Product name-->
                            <h5 class=\"fw-bolder\">".$this->tab[1][1]["titre"]."</h5>
                            <!-- Product reviews-->
                            <div class=\"d-flex justify-content-center small text-warning mb-2\">
                                <div class=\"bi-star-fill\"></div>
                                <div class=\"bi-star-fill\"></div>
                                <div class=\"bi-star-fill\"></div>
                                <div class=\"bi-star-fill\"></div>
                                <div class=\"bi-star-fill\"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class=\"card-footer p-4 pt-0 border-top-0 bg-transparent\">
                        <div class=\"text-center\"><a class=\"btn btn-outline-dark mt-auto\" href=\"#\">Add to cart</a></div>
                    </div>
                </div>
            </div>
            <div class=\"col mb-5\">
                <div class=\"card h-100\">
                    <!-- Sale badge-->
                    <div class=\"badge bg-dark text-white position-absolute\" style=\"top: 0.5rem; right: 0.5rem\">Sale</div>
                    <!-- Product image-->
                    <img class=\"card-img-top\" src=\"$url_img/".$this->tab[1][2]["id"].".jpg\" alt=\"...\" />
                    <!-- Product details-->
                    <div class=\"card-body p-4\">
                        <div class=\"text-center\">
                            <!-- Product name-->
                            <h5 class=\"fw-bolder\">".$this->tab[1][2]["titre"]."</h5>
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class=\"card-footer p-4 pt-0 border-top-0 bg-transparent\">
                        <div class=\"text-center\"><a class=\"btn btn-outline-dark mt-auto\" href=\"#\">Add to cart</a></div>
                    </div>
                </div>
            </div>
            <div class=\"col mb-5\">
                <div class=\"card h-100\">
                    <!-- Product image-->
                    <img class=\"card-img-top\" src=\"$url_img/".$this->tab[1][3]["id"].".jpg\" alt=\"...\" />
                    <!-- Product details-->
                    <div class=\"card-body p-4\">
                        <div class=\"text-center\">
                            <!-- Product name-->
                            <h5 class=\"fw-bolder\">".$this->tab[1][3]["titre"]."</h5>
                            <!-- Product reviews-->
                            <div class=\"d-flex justify-content-center small text-warning mb-2\">
                                <div class=\"bi-star-fill\"></div>
                                <div class=\"bi-star-fill\"></div>
                                <div class=\"bi-star-fill\"></div>
                                <div class=\"bi-star-fill\"></div>
                                <div class=\"bi-star-fill\"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class=\"card-footer p-4 pt-0 border-top-0 bg-transparent\">
                        <div class=\"text-center\"><a class=\"btn btn-outline-dark mt-auto\" href=\"#\">Add to cart</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>";
        return $content;
    }

    public function render($selecteur)
    /**
     * Cette fonction permet de recuperer les méthode qui sont en priver à partir des controller
     */
    {
        switch ($selecteur) {
            case 0:
                {
                    $content = $this->htmlAccueil();
                    break;
                }
            case 1:
                {

                    $content = $this->affichage_Categorie();
                    break;
                }
            case 2:
                {
                    $content = $this->affichage_Produit();
                    break;
                }
        }
        $creator = new HTML_Creator($this->tab, $this->container);
        $html = $creator->html_body($content);
        return $html;
    }

    public function renderProduct($selecteur)
    /**
     * Cette fonction permet de recuperer les méthode qui sont en priver à partir des controller
     */
    {
        switch ($selecteur) {
            case 1:
                {
                    $content = $this->affichageUnProduit();
                    break;
                }
        }
        $creator = new HTML_Creator($this->tab, $this->container);
        $html = $creator->html_pruduct($content);
        return $html;
    }

    public function renderJSON($selecteur)
    {
        $json = "";
        switch ($selecteur) {
            case 0:
                {
                    $json = $this->affichageJSONCategorie();
                    break;
                }
            case 1:
                {
                    $json = $this->affichageJSONUneCategorie();
                    break;
                }
        }
        return $json;
    }

    // Cr�er un document en format json
    private function affichageJSONCategorie()
    {
        $json = "{\"type\":\"categorie\", \"categories\":[{";
        foreach ($this->tab as $l) {
            $json .= "\"categorie\": {\"idcateg\":$l[id],\"nom\":\"$l[nom]\"},";
        }
        $json .= "}]}";
        return $json;
    }

    // Cr�er un document en format json
    private function affichageJSONUneCategorie()
    {
        $json = "{";
        $json .= "\"id\":\"" . $this->tab["id"] . "\",\"nom\":\"" . $this->tab["nom"] . "\"";
        $json .= "}";
        return $json;
    }
}