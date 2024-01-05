<?php

require_once("Route.php");
require_once("MainController.php");
require_once("RouteIndex.php");

    class Router
    {
        protected $routeList = [];
        protected $ctrlList = [];
        protected $action_key;

        // Constructeur du routeur (initialise les attributs)
        public function __construct(string $name_of_action_key ="action")
        {
            $this->action_key = $name_of_action_key;
            $this->createControllerList();
            $this->createRouteList();
        }

        // Initialise la liste de controlleurs
        protected function createControllerList()
        {
            $this->ctrlList["main"] = new MainController(); 
        }

        // Initialise la liste de routes
        protected function createRouteList()
        {
            $this->routeList["index"] = new RouteIndex($this->ctrlList["main"]); 
        }

        //Determine la route
        public function routing($get, $post)
        {
            $action = $get[$this->action_key] ?? $post[$this->action_key] ?? "index";
        }
    }

?>