<?php

    abstract class Route
    {
        protected $controller;

        // Initialise les attributs
        public function __construct($controller)
        {
            $this->controller = $controller;
        }

        // Appelle la méthode voulue get ou post en fonction du paramètre method
        public function action($params = [], $method = 'GET')
        {
            if ($method === 'GET') {
                return $this->get($params);
            } elseif ($method === 'POST') {
                return $this->post($params);
            }

            throw new Exception("Méthode non supportée");
        }

        // Recupere les parametres
        protected function getParam(array $array, string $paramName, bool $canBeEmpty = true)
        {
            if (isset($array[$paramName])) {
                if (!$canBeEmpty && empty($array[$paramName])) {
                    throw new Exception("Paramètre '$paramName' vide");
                }
                return $array[$paramName];
            } else {
                throw new Exception("Paramètre '$paramName' absent");
            }
        }

        abstract protected function get($params = []);

        abstract protected function post($params = []);
    }

?>