<?php
require_once('controllers/Router/Route.php');

/**
 * Classe dérivée de Route, gérant la route vers la page d'accueil.
 */
class RouteIndex extends Route
{
    private MainController $controller;


    public function __construct(MainController $controller)
    {
        // Appel du constructeur de la classe parente 
        parent::__construct();

        // Attribution du contrôleur principal passé en paramètre
        $this->controller = $controller;
    }

    /**
     * Gère les requêtes HTTP GET pour la route
     */
    protected function get($params = [])
    {
        $this->controller->Index();
    }

    /**
     * Gère les requêtes HTTP POST pour la route
     */
    protected function post($params = [])
    {
        $this->controller->Index();
    }
}
?>
