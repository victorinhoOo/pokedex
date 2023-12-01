<?php

require_once 'Model.php'; 
require_once 'Pokemon.php'; 

class PokemonManager extends Model
{
    public function getAll()
    {
        $sql = 'SELECT * FROM Pokemons'; 
        $result = $this->execRequest($sql);
        $pokemons = [];
        
        foreach ($result as $row) {
            $pokemons[] = new Pokemon(
                $row['idPokemon'],
                $row['nomEspece'],
                $row['description'],
                $row['typeOne'],
                $row['typeTwo'],
                $row['urlImg']
            );
        }
        
        return $pokemons;
    }

    public function getByID(int $idPokemon)
    {
        $sql = 'SELECT * FROM pokemons WHERE idPokemon = ?'; 
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
}


