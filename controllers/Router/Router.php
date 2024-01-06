<?php

require_once("Route.php");
require_once("controllers/MainController.php");
require_once("controllers/PokemonController.php");

require_once("controllers/Router/Route/RouteIndex.php");
require_once("controllers/Router/Route/RouteAddPokemon.php");
require_once("controllers/Router/Route/RouteAddType.php");
require_once("controllers/Router/Route/RouteSearch.php");

    // Responsable de la gestion des routes et du routage des requêtes HTTP.
    class Router
    {
        private $routeList = [];
        private $controllerList = [];
        private $action_key;

        // Constructeur du routeur (initialise les attributs)
        public function __construct(string $name_of_action_key ="action")
        {
            $this->createControllerList();
            $this->createRouteList();
            $this->action_key = $name_of_action_key;
        }

        // Initialise la liste de controlleurs
        protected function createControllerList()
        {
            $this->controllerList = [
                'main' => new MainController(),
                'pokemonControll' => new PokemonController()
            ];
        }

        // Initialise la liste de routes
        protected function createRouteList()
        {
            $this->routeList = [
                'index' => new RouteIndex($this->controllerList["main"]),
                'add-pokemon' => new RouteAddPokemon($this->controllerList["pokemonControll"]),
                'add-type' => new RouteAddType($this->controllerList["pokemonControll"]),
                'search' => new RouteSearch($this->controllerList['main']),
            ];
        }

        //Determine la route en fonction des informations dans $_GET/$_POST, puis va appeler la méthode action de la route.
        public function routing(array $get = [], array $post = []) : void
        {
            // Récupération de l'action à partir des paramètres GET ou POST, ou utilisation de "index" par défaut
            $action = $get[$this->action_key] ?? $post[$this->action_key] ?? "index";
    
            // Vérification de l'existence de la route correspondante
            if(isset($this->routeList[$action])) 
            {
                // Appel de la méthode "action" de la route en fonction du type de requête (GET ou POST)
                if ($post === []) 
                {
                    $this->routeList[$action]->action($get);
                }
                else 
                {
                    $this->routeList[$action]->action($post, "POST");
                }
            }
        }
    }

?>