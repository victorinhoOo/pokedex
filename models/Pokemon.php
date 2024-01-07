<?php
require_once('PkmnType.php');
require_once('PkmnTypeManager.php');

// Gère les attributs d'un Pokémon
class Pokemon {
    private int $idPokemon;
    private string $nomEspece;
    private string $description;
    private ?PkmnType $typeOne;
    private ?PkmnType $typeTwo;
    private string $urlImg;


    public function __construct($idPokemon, $nomEspece, $description, $typeOne, $typeTwo, $urlImg) {
        $this->idPokemon = $idPokemon;
        $this->nomEspece = $nomEspece;
        $this->description = $description;
        $this->setTypeOne($typeOne);
        $this->setTypeTwo($typeTwo);
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

    private PkmnTypeManager $typeManager;
    public function setTypeOne(PkmnType|int $typeOne): void
    {
        $typeManager = new PkmnTypeManager();

        if ($typeOne instanceof PkmnType) { // Premier cas : le paramètres est un type 
            $this->typeOne = $typeOne;
        } else { // deuxième cas : le paramètre est un id supérieur à 0
            $id = (int) $typeOne;
            if ($id > 0) {
                $this->typeOne = $typeManager->getByID($id); // On appelle le manager pour attribuer le type correspondant
            } else {
                // id incorrect
                $this->typeOne = null;
            }
        }
    }

    public function setTypeTwo(PkmnType|int|null|string $typeTwo): void
    {
        $typeManager = new PkmnTypeManager();
    
        if ($typeTwo instanceof PkmnType) { // Premier cas : le paramètre est un type 
            $this->typeTwo = $typeTwo;
        } else { // deuxième cas : le paramètre est un ID supérieur à 0
            $id = (int) $typeTwo;
            if ($id > 0) {
                $this->typeTwo = $typeManager->getByID($id); // Utilisation de la flèche "->" pour appeler la méthode
            } else {
                // ID incorrect ou null
                $this->typeTwo = null;
            }
        }
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
