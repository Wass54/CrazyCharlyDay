<?php
declare(strict_types = 1);
namespace custumbox\vue;

/**La classe VueParticipant est la classe qui affiche le plus sur le site  */
class VueParticipant
{

    private \Slim\Container $container;

    public array $tab; // c'est le tableau 

    public function __construct(array $tab, \Slim\Container $container)
    {
        $this->tab = $tab;
        $this->container = $container;
    }

    /** A l'acceuil de la page on vous propose de creer un compte mais bien evidement vous n'êtes pas obliger */
    private function htmlAccueil(): string
    {
        $content = "Bienvenue dans custumbox";
        return $content;
    }






    public function render($selecteur) /**Cette fonction permet de recuperer les méthode qui sont en priver à partir des controller */
    {
        switch ($selecteur) {
            case 0:
                {
                    $content = $this->htmlAccueil();
                    break;
                }
        }
        $creator = new HTML_Creator($this->tab, $this->container);
        $html = $creator->html_body($content);
        return $html;
    }
}