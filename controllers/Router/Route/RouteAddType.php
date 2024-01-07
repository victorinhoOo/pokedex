<?php
require_once("controllers/Router/Route.php");
require_once("controllers/PokemonController.php");

/**
 *  Classe dérivée de Route, gérant la route pour ajouter un type de Pokémon
 */
class RouteAddType extends Route
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
        return $this->controller->displayAddType();
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
                    "nomType" => parent::getParam($params, "nomType", false),
                    "urlImg" => parent::getParam($params, "urlImg", false)
                ];
                $this->controller->addType($data);
            }
        }
        // Si des informations manquent, affiche la page AddType avec un message d'erreur.
        catch(Exception $e)
        {
            $this->controller->displayAddType("Informations du type incomplètes, échec de l'ajout");
        }
    }
}
?>
