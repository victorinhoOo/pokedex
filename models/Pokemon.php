<?php

class Pokemon {
    private int $idPokemon;
    private string $nomEspece;
    private string $description;
    private string $typeOne;
    private string $typeTwo;
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

    public function hydrate(array $data): void {
        if (isset($data['idPokemon'])) {
            $this->SetIdPokemon($data['idPokemon']);
        }

        if (isset($data['nomEspece'])) {
            $this->setNomEspece($data['nomEspece']);
        }

        if (isset($data['description'])) {
            $this->SetDescription($data['description']);
        }

        if (isset($data['typeOne'])) {
            $this->SetTypeOne($data['typeOne']);
        }

        if (isset($data['typeTwo'])) {
            $this->SetTypeTwo($data['typeTwo']);
        }

        if (isset($data['urlImg'])) {
            $this->SetUrlImg($data['urlImg']);
        }
    }
    
}
