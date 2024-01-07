<?php
require_once("views/View.php");
require_once("models/PokemonManager.php");
require_once("models/PkmnTypeManager.php");
require_once("models/PkmnType.php");

/* Gère les actions liées aux Pokémon dans l'application.
 * permet d'afficher, d'ajouter, de modifier et de supprimer des Pokémon.
 */
class PokemonController
{
    private PokemonManager $manager;
    private MainController $controller;

    private PkmnTypeManager $typeManager;

    private PkmnType $types;

    public function __construct()
    {
        $this->manager = new PokemonManager();
        $this->controller = new MainController();
        $this->typeManager = new PkmnTypeManager();
    }

    /**
     * Affiche la page d'ajout de Pokémon
     *
     * @param string|null $message Message à afficher
     */
    public function displayAddPokemon(?string $message = null)
    {
        $types = $this->typeManager->getAll();
        $addPokeView = new View('AddPokemon');
        $addPokeView->generer([
            'message' => $message,
            'types' => $types,
        ]);
    }

    /**
     * Affiche la page d'ajout de type de Pokémon.
     * 
     * @param string|null $message Message à afficher
     */
    public function displayAddType(?string $message = null)
    {
        $addTypeView = new View('AddType');
        $donnees = ['message' => $message];
        $addTypeView->generer($donnees);
    }

    /**
     * Créé un type de Pokémon à partir des données fournies, l'ajoute à la base de données,
     * puis affiche la page d'accueil avec un message.
     * 
     * @param array $infoType Les données du type de Pokémon à ajouter
     */
    public function addType(array $infoType){

        $type = new PkmnType($infoType);
        $this->typeManager->createPkmnType($type);
        $message = "Le type a été ajouté avec succès";

        $this->controller->Index($message);

    }

    /**
     * Crée un Pokémon à partir des données fournies, l'ajoute à la base de données,
     * puis affiche la page d'accueil avec un message.
     *
     * @param array $infoPokemon Les données du Pokémon à ajouter
     */
    public function addPokemon(array $infoPokemon)
    {
        $isValid = true;
        // Vérifie que tous les champs obligatoires sont présents
        $requiredFields = ['nomEspece', 'description', 'typeOne', 'urlImg'];

        foreach ($requiredFields as $field) {
            if (!isset($infoPokemon[$field]) || empty($infoPokemon[$field])) {
                // Si un champ obligatoire est manquant ou vide, on marque la validation comme non réussie
                $isValid = false;
                $message = "Le champ '$field' est obligatoire et ne peut pas être vide.";
            }
        }

        // Si la validation des champs obligatoires a réussi :
        if ($isValid) {
            // On crée un objet Pokémon à partir des données fournies dans le tableau $infoPokemon.
            $pokemon = new Pokemon(
                -1, //valeur arbitraire
                $infoPokemon['nomEspece'],
                $infoPokemon['description'],
                $infoPokemon['typeOne'],
                $infoPokemon['typeTwo'],
                $infoPokemon['urlImg']
            );

            // On appelle la méthode createPokemon du manager
            $id = $this->manager->createPokemon($pokemon);

            if (isset($id)) {
                $message = "Pokémon ajouté avec succès";
            } else {
                $message = "Le pokémon n'a pas pu être ajouté";
            }
        }
        $this->controller->Index($message);
    }

    

    /**
     * Tente de supprimer un Pokémon en fonction de son ID et affiche la page d'accueil
     * avec un message de succès ou d'erreur
     *
     * @param int $idPokemon L'ID du Pokémon à supprimer
     */
    public function deletePokemonAndIndex(int $idPokemon)
    {
        $message = "Le Pokémon " . $idPokemon . " n'existe pas ou a déjà été supprimé";

        // Si l'ID du Pokémon existe
        if (!empty($idPokemon)) {
            // On supprime le Pokémon via le manager et on récupère le nombre de lignes affectées
            $rowCount = $this->manager->deletePokemon($idPokemon);
            if ($rowCount > 0) {
                $message = "Pokémon supprimé avec succès !";
            }
        }
        // Appel l'index du MainController en passant le message
        $this->controller->Index($message);
    }

    /**
     * Affiche la page d'édition d'un Pokémon en fonction de son ID
     *
     * @param int $idPokemon L'ID du Pokémon à éditer
     */
    public function displayEditPokemon(int $idPokemon)
    {
        $pokemon = $this->manager->getByID($idPokemon);
        $types = $this->typeManager->getAll();

        if (!$pokemon) {
            $this->displayAddPokemon("ID non trouvé");
            return;
        }

        $vueEditPokemon = new View('AddPokemon');
        $vueEditPokemon->generer([
            'message' => null,
            'pokemon' => $pokemon,
            'types' => $types,
        ]);
    }

    /**
     * Édite un Pokémon en fonction des données fournies, puis affiche la page d'accueil
     * avec un message de succès ou d'erreur
     *
     * @param array $dataPokemon Les données du Pokémon à éditer
     */
    public function editPokemonAndIndex(array $dataPokemon)
    {

        $rowCount = $this->manager->editPokemonAndIndex($dataPokemon);

        if ($rowCount > 0) {
            $message = "Mise à jour réussie !";
        } else {
            $message = "La mise à jour a échoué.";
        }

        $this->controller->Index($message);
    }


}


?>