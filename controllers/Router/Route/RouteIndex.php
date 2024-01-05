<?php

    require_once('controllers/Router/Route.php');

    class RouteIndex extends Route
    {
        public function __construct($controller)
        {
            parent::__construct($controller);
        }

        protected function get($params = [])
        {
            return $this->controller->index();
        }

        protected function post($params = [])
        {
            return $this->controller->index();
        }
    }

?>