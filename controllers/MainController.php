<?php

require_once("views/View.php");
require_once ("models/PokemonManager.php");

    class MainController{
        public function Index() : void {
        $manager = new PokemonManager();

        // Récupération de tous les Pokémon
        $allPokemons = $manager->getAll();

        // Récupération d'un Pokémon par id
        $id = 1; 
        $first = $manager->getByID($id);

        $indexView = new View('Index');

        $indexView->generer(['nomDresseur' => "Victor", 'allPokemons' => $allPokemons]);
        }
    }
?>