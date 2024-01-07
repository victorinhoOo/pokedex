<?php
require_once('controllers/Router/Route.php');

/**
 * Classe dérivée de Route, gérant la route pour rechercher un Pokémon
 */
class RouteSearch extends Route
{
    private MainController $controller;


    public function __construct(MainController $controller)
    {
        // Appel du constructeur de la classe parente 
        parent::__construct();

        // Attribution du contrôleur principal passé en paramètre
        $this->controller = $controller;
    }

    /**
     * Gère les requêtes HTTP GET pour la route
     */
    protected function get($params = [])
    {
        $this->controller->displaySearch();
    }

    /**
     * Gère les requêtes HTTP POST pour la route
     */
    protected function post($params = [])
    {
        try 
        {
            if (!empty($params))
            {
                $critere = parent::getParam($params, "critere", false);
                $valeur = parent::getParam($params, "valeur", false);
    
                // Vérifier le type de données de la valeur en fonction du critère
                if ($critere == 'idPokemon' && !is_numeric($valeur)) {
                    throw new Exception("L'ID doit être un entier.");
                }
                
                else if (!empty($valeur)){
                    $this->controller->Search($critere, $valeur);
                }
                else{
                    throw new Exception("Aucune valeur n'a été saisie");
                }
            }
        }
        // Si des informations manquent ou si le type est incorrect, affiche la page avec un message d'erreur
        catch(Exception $e)
        {
            $this->controller->displaySearch("Erreur de recherche : " . $e->getMessage());
        }
    }
}
?>
