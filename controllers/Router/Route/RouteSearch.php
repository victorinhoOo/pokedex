<?php
require_once('controllers/Router/Route.php');

/**
 * Classe dérivée de Route, gérant la route pour rechercher un Pokémon
 */
class RouteSearch extends Route
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
        $this->controller->Search();
    }

    /**
     * Gère les requêtes HTTP POST pour la route
     */
    protected function post($params = [])
    {

    }
}
?>
