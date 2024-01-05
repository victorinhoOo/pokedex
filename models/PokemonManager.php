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
}


