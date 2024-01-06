<?php
require_once("controllers/Router/Route.php");
require_once("controllers/PokemonController.php");

/**
 *  Classe dérivée de Route, gérant la route pour ajouter un Pokémon.
 */
class RouteAddPokemon extends Route
{
    private PokemonController $controller;

    public function __construct(PokemonController $controller)
    { 
        // Appel du constructeur de la classe parente 
        parent::__construct();

        // Attribution du contrôleur approprié
        $this->controller = $controller;
    }

    /**
     * Gère les requêtes HTTP GET pour la route
     */
    protected function get($params = [])
    {
        return $this->controller->displayAddPokemon();
    }

    /**
     * Gère les requêtes HTTP POST pour la route 
     */
    protected function post($params = [])
    {
        
    }
}
?>
