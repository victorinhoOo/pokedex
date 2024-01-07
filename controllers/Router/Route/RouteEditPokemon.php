<?php

/**
 *  Classe dérivée de Route, gérant la route pour modifier un Pokémon.
 */
class RouteEditPokemon extends Route {
    private PokemonController $controller;

    /**
     * Constructeur de la route d'édition de Pokémon.
     *
     * @param PokemonController $controller L'instance du contrôleur de Pokémon.
     */
    public function __construct(PokemonController $controller)
    {
        parent::__construct();
        $this->controller = $controller;
    }

    /**
     * Gère les requêtes HTTP GET pour afficher le formulaire d'édition de Pokémon.
     *
     * @param array $params Les paramètres de la requête.
     */
    protected function get($params = [])
    {
        $idPokemon = (int)$this->getParam($_GET, 'idPokemon', false);
        $this->controller->displayEditPokemon($idPokemon);
    }

    /**
     * Gère les requêtes HTTP POST pour traiter la modification de Pokémon.
     *
     * @param array $params Les paramètres de la requête POST.
     */
    protected function post($params = [])
    {
        try 
        {
            if (!empty($params))
            {
                $data = [
                    "idPokemon" => parent::getParam($params, "idPokemon", false),
                    "nomEspece" => parent::getParam($params, "nomEspece", false),
                    "description" => parent::getParam($params, "description"),
                    "typeOne" => parent::getParam($params, "typeOne", false),
                    "typeTwo" => (parent::getParam($params, "typeTwo") !== "null") ? parent::getParam($params, "typeTwo") : null,
                    "urlImg" => parent::getParam($params, "urlImg")
                ];
                $this->controller->editPokemonAndIndex($data);
            }
        }
        // Si des informations manquent, affiche la page AddPokemon avec un message d'erreur.
        catch(Exception $e)
        {
            $this->controller->displayAddPokemon("Informations du Pokémon incomplètes, échec de la modification");
        }
    }
}