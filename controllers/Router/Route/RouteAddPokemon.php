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
            if (!empty($params))
            {
                $data = [
                    "nomEspece" => parent::getParam($params, "nomEspece", false),
                    "description" => parent::getParam($params, "description"),
                    "typeOne" => parent::getParam($params, "typeOne", false),
                    "typeTwo" => (parent::getParam($params, "typeTwo") !== "null") ? parent::getParam($params, "typeTwo") : null,
                    "urlImg" => parent::getParam($params, "urlImg", false)
                ];
                $this->controller->addPokemon($data);
            }
        }
        // Si des informations manquent, affiche la page AddPokemon avec un message d'erreur.
        catch(Exception $e)
        {
            $this->controller->displayAddPokemon("Informations du Pokémon incomplètes, échec de l'ajout");
        }
    }
}
?>
