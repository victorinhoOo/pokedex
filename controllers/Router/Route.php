<?php

    abstract class Route
    {

        public function __construct() {

        }

        // Appelle la méthode appropriée (get ou post) en fonction de la méthode HTTP spécifiée.
        public function action($params = [], $method = 'GET')
        {
            if ($method === 'GET') {
                return $this->get($params);
            } elseif ($method === 'POST') {
                return $this->post($params);
            }

            throw new Exception("Méthode non supportée");
        }

        /**
         * Récupère un paramètre du tableau de paramètres et effectue des vérifications.
         *
         * @param array  $array      Le tableau de paramètres.
         * @param string $paramName  Le nom du paramètre à récupérer.
         * @param bool   $canBeEmpty Indique si le paramètre peut être vide (par défaut à true).
         *
         * @return mixed La valeur du paramètre récupéré.
         */
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

        // Méthode abstraite pour gérer les requêtes HTTP GET
        abstract protected function get($params = []);

        // Méthode abstraite pour gérer les requêtes HTTP POST
        abstract protected function post($params = []);
    }

?>