<?php
    declare(strict_types=1);
    require_once('controllers/MainController.php');
    require_once ('models/PokemonManager.php');


    $controller = new MainController();
    $manager = new PokemonManager();



    $allPokemons = $manager->getAll();

    $controller->Index();
?>