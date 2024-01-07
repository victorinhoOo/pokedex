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
                'message' => $message,
                'textMode' => false
            ];

            $indexView->generer($donnees);
        }

        /**
         * Affiche la page de recherche.
         */
        public function displaySearch(?string $message = null): void
        {
            $indexView = new View('Search');

            // Les données à transmettre à la vue
            $donnees = [
                'message' => $message
            ];

            $indexView->generer($donnees);
        }
        
        /**
         * Effectue la recherche depuis le manager puis affiche le résultat sur la page d'accueil
         */
        public function Search(string $critere, string $valeur, ?string $message = null){
            $indexView = new View('Index');
            $manager = new PokemonManager();
            $typeManager = new PkmnTypeManager();
            $textMode = false;

            if($critere == "type"){ // si on recherche par type alors il faut récupérer l'id du type correspondant au nom saisi
                $valeur = strval($typeManager->getIdType($valeur));
                $textMode = true; // Pour afficher les types en version texte lors de la recherche
            }
            $result = $manager->searchPokemon($critere, $valeur);
            
            if ($result == null){
                $message = "Aucun résultat";
            }

            $donnees = [
                'nomDresseur' => "Victor",
                'allPokemons' => $result,
                'message' => $message,
                'textMode' => $textMode
            ];

            $indexView->generer($donnees);
        }
    }
?>