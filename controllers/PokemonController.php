<?php

require_once("views/View.php");
require_once ("models/PokemonManager.php");

class PokemonController{
    private PokemonManager $pokemonManager;
    private MainController $mainController;

    public function __construct() {
        $this->pokemonManager = new PokemonManager();
        $this->mainController = new MainController();
    }

    public function displayAddPokemon()
    { 
        $indexView = new View('AddPokemon');
        $indexView -> generer([]);
    }
}

?>