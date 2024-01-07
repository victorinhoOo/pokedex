<?php

// Gère les attributs d'un Pokémon
class Pokemon {
    private int $idPokemon;
    private string $nomEspece;
    private string $description;
    private int $typeOne;
    private ?int $typeTwo;
    private string $urlImg;

    public function __construct($idPokemon, $nomEspece, $description, $typeOne, $typeTwo, $urlImg) {
        $this->idPokemon = $idPokemon;
        $this->nomEspece = $nomEspece;
        $this->description = $description;
        $this->typeOne = $typeOne;
        $this->typeTwo = $typeTwo;
        $this->urlImg = $urlImg;
    }

    public function getIdPokemon() {
        return $this->idPokemon;
    }

    public function getNomEspece() {
        return $this->nomEspece;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getTypeOne() {
        return $this->typeOne;
    }

    public function getTypeTwo() {
        return $this->typeTwo;
    }

    public function getUrlImg() {
        return $this->urlImg;
    }

    public function setIdPokemon($idPokemon) {
        $this->idPokemon = $idPokemon;
    }

    public function setNomEspece($nomEspece) {
        $this->nomEspece = $nomEspece;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setTypeOne($typeOne) {
        $this->typeOne = $typeOne;
    }

    public function setTypeTwo($typeTwo) {
        $this->typeTwo = $typeTwo;
    }

    public function setUrlImg($urlImg) {
        $this->urlImg = $urlImg;
    }

    // Hydrate l'objet avec les données du tableau associatif
    public function hydrate(array $data): void {
        foreach ($data as $key => $value) {
            $methodName = 'set' . ucfirst($key);
            if (method_exists($this, $methodName)) {
                $this->$methodName($value);
            }
        }
    }
    
}
