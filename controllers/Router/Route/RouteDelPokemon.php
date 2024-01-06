<?php

require_once("controllers/Router/Route.php");
require_once("controllers/PokemonController.php");

/**
 * Route pour supprimer un pokemon et afficher l'index
 */
class RouteDelPokemon extends Route
{
    private PokemonController $controller;

    public function __construct(PokemonController $controller)
    { 
        parent::__construct();
        $this->controller = $controller;
    }

    /**
     * Gère la méthode get en essayant de supprimer le pokemon
    */
    protected function get($params = []) : void
    {
        //Si l'id pokemon est present et est un nombre on delete 
        if (!empty($params['idPokemon']) and is_numeric($params['idPokemon'])) 
        {
            $this->controller->deletePokemonAndIndex($params['idPokemon']);
        }
        //Sinon on affiche l'index sans parametre et on lève un exception
        else
        {
            $this->controller->deletePokemonAndIndex();
            throw new Exception("idPokemon incorrect");
        }
    }

    /**
     * Execute la méthode post
     * @param array $params paramettres du formulaire (methode post)
     */
    protected function post($params = []) : void
    {

    }



}


?>