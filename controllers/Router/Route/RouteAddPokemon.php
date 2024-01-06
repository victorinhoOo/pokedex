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
        try
        {
            $data = 
            [
                "nomEspece" => parent::getParam($params, "nomEspece", false),
                "description" => parent::getParam($params, "description", false),
                "typeOne" => parent::getParam($params, "typeOne", false),
                "typeTwo" => parent::getParam($params, "typeTwo", false),
                "urlImg" => parent::getParam($params, "urlImg", false),
            ];
    
            // ajouter le Pokémon à la bdd
            $this->controller->addPokemon($data);
        }
        catch (Exception $exception)
        {
            $this->controller->displayAddPokemon($exception);
        }
    }
}
?>
