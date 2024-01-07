<?php

require_once('Model.php');
require_once('Pokemon.php');

// Gère les opérations CRUD pour les Pokémons dans la BDD
class PokemonManager extends Model
{
    // Récupère tous les Pokémon depuis la base de données
    public function getAll()
    {
        $sql = 'SELECT * FROM pokemon'; 
        $result = $this->execRequest($sql);
        $pokemons = [];
        
        foreach ($result as $row) {
            $allPokemons[] = new Pokemon(
                $row['idPokemon'],
                $row['nomEspece'],
                $row['description'],
                $row['typeOne'],
                $row['typeTwo'],
                $row['urlImg']
            );
        }
        
        return $allPokemons;
    }

    // Récupère un Pokémon spécifique depuis la base de données en utilisant son ID
    public function getByID(int $idPokemon)
    {
        $sql = 'SELECT * FROM pokemon WHERE idPokemon = ?'; 
        $result = $this->execRequest($sql, [$idPokemon]);
        $row = $result->fetch();
        
        if ($row) {
            return new Pokemon(
                $row['idPokemon'],
                $row['nomEspece'],
                $row['description'],
                $row['typeOne'],
                $row['typeTwo'],
                $row['urlImg']
            );
        } else {
            return null;
        }
    }

    // Creé un nouveau pokémon dans la base de données
    public function CreatePokemon(Pokemon $pokemon): int{
        $nomEspece = $pokemon->getNomEspece();
        $description = $pokemon->getDescription();
        $type1 = $pokemon->getTypeOne();
        $type2 = $pokemon->getTypeTwo();
        $urlImg = $pokemon->getUrlImg();
    
        $sql = "INSERT INTO pokemon (nomEspece, description, typeOne, typeTwo, urlImg) VALUES (:nomEspece,:description,:type1,:type2,:urlImg)";
        $donnees = [":nomEspece" => $nomEspece, ":description" => $description, ":type1" => $type1, ":type2" => $type2, ":urlImg" => $urlImg];
        $stmt = $this->execRequest($sql, $donnees);
        $id = $stmt->fetch(PDO::FETCH_ASSOC);
               
        return (int)$id;
    }


    // Supprime un Pokémon de la base de données en utilisant son ID.
    public function deletePokemon(int $idPokemon = -1): int {
        $sql = "DELETE FROM pokemon WHERE idPokemon = :id";
        $stmt = $this->execRequest($sql, [':id' => $idPokemon]);
        return $stmt->rowCount();
    }

    // Modifie les informations d'un Pokémon existant dans la base de données en utilisant un tableau de données.
    public function editPokemonAndIndex(array $dataPokemon): int{
        $rowCount = -1;

        // on verifie si l'ID du Pokémon est fourni dans le tableau de données
        if (isset($dataPokemon['idPokemon']))
        {
            $sql = "UPDATE `pokemon` SET `nomEspece` = ?, `description` = ?, `typeOne` = ?, `typeTwo` = ?, `urlImg` = ? WHERE `pokemon`.`idPokemon` = ?";

            // On vérifie si les 2 types sont les même, si oui, alors le 2ème type peut être null
            $typeTwo = ($dataPokemon['typeOne'] === $dataPokemon['typeTwo']) ? null : $dataPokemon['typeTwo'];

            $params = [
                $dataPokemon['nomEspece'],
                $dataPokemon['description'],
                $dataPokemon['typeOne'],
                $typeTwo,
                $dataPokemon['urlImg'],
                $dataPokemon['idPokemon'],
            ];

            $rowCount = $this->execRequest($sql, $params)->rowCount();
        }

        return $rowCount;
    }
}


