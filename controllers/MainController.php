<?php

require_once("views/View.php");
require_once("models/PokemonManager.php");

    /*  Gère les actions principales de l'application, telles que l'affichage de la page d'accueil
    et de la page de recherche. */
    class MainController
    {
        /**
         * Affiche la page d'accueil de l'application avec la liste de tous les Pokémon.
         *
         * @param string|null $message Message à afficher
         */
        public function Index(?string $message = null): void
        {
            $manager = new PokemonManager();

            // Récupération de tous les Pokémon depuis la base de données
            $allPokemons = $manager->getAll();

            $indexView = new View('Index');

            // Les données à transmettre à la vue
            $donnees = [
                'nomDresseur' => "Victor",
                'allPokemons' => $allPokemons,
                'message' => $message
            ];

            $indexView->generer($donnees);
        }

        /**
         * Affiche la page de recherche.
         */
        public function Search(): void
        {
            $indexView = new View('Search');

            // Les données à transmettre à la vue
            $donnees = [];

            $indexView->generer($donnees);
        }

    }
?>