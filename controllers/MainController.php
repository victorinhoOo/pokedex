<?php

require_once("views/View.php");
require_once ("models/PokemonManager.php");

    class MainController{

        public function Index() : void {
        $manager = new PokemonManager();
        // Récupération de tous les Pokémon
        $allPokemons = $manager->getAll();

        $indexView = new View('Index');

        $donnees = [
            'nomDresseur' => "Victor",
            'allPokemons' => $allPokemons
        ];

        $indexView->generer($donnees);

        }

        public function Search() : void {

            $indexView = new View('Search');

            $donnees = [];
            $indexView->generer($donnees);
        }
    }
?>