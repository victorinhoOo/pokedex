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

    public function displayAddPokemon(?string $message = null)
    { 
        $addPokeView = new View('AddPokemon');
        $donnees = ['message'=> $message];
        $addPokeView -> generer($donnees);
    }

    public function displayAddType(){
        $addTypeView = new View('AddType');
        $addTypeView -> generer([]);
    }

    // créé un pokemon puis affiche la page d'accueil
    public function addPokemon(array $infoPokemon)
    {
        $manager = new PokemonManager();
        $controller = new MainController();
    
        // Créez un objet Pokémon avec les données du tableau $infoPokemon
        $pokemon = new Pokemon(
            -10,
            $infoPokemon['nomEspece'],
            $infoPokemon['description'],
            $infoPokemon['typeOne'],
            $infoPokemon['typeTwo'],
            $infoPokemon['urlImg']
        );
    
        // Appeler la méthode createPokemon du manager pour ce Pokémon
        $id = $manager->createPokemon($pokemon);
    
        if (isset($id)) {
            $message = "Pokémon ajouté avec succès";
        } else {
            $message = "Le pokémon n'a pas pu être ajouté";
        }
    
        // Récupération de tous les Pokémon depuis la base de données
        $allPokemonsFromDB = $manager->getAll();
    
        $donnees = [
            'nomDresseur' => "Victor",
            'allPokemons' => $allPokemonsFromDB, 
            'message' => $message 
        ];
    
        $controller->Index($donnees);
    }

    // Essaye de supprimer le pokemon et affiche l'index avec le message de succes
    public function deletePokemonAndIndex(int $idPokemon){
        $manager = new PokemonManager();
        $message = "Le Pokémon ". $idPokemon. " n'existe pas ou à déjà été supprimé";

        //si l'id pokemon existe
        if (!empty($idPokemon))
        {
            //on supprime le pokemon via le manager et récupere le nombre de lignes affectées
            $rowCount = $manager->deletePokemon($idPokemon);
            if ($rowCount > 0)
            {
                $message = "Pokémon supprimé avec succès !";
            }
        }
        //appel l'index du main controller en passant le message
        $this->mainController->Index($message);
    }
}

?>