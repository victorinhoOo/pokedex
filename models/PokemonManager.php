<?php

require_once('Model.php');
require_once('Pokemon.php');

class PokemonManager extends Model
{
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


    // Supprime un pokémon dans la base de données
    public function deletePokemon(int $idPokemon = -1): int {
        $sql = "DELETE FROM pokemon WHERE idPokemon = :id";
        $stmt = $this->execRequest($sql, [':id' => $idPokemon]);
        return $stmt->rowCount();
    }
}


