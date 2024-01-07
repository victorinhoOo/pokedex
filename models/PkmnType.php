<?php

    /**
     * Gère les attributs d'un type de Pokémon
     */
    class PkmnType {
        private ?int $idType;   
        private string $nomType;   
        private string $urlImg;


        public function __construct(array $data) {
            $this->hydrate($data);
        }

        /**
         * Initialise les attributs de l'objet avec les données fournies.
         *
         * @param array $donnees Les données du type à initialiser.
         */
        public function hydrate(array $donnees)
        {
            foreach($donnees as $key => $value){
                $method = 'set'.ucfirst($key);
                if(method_exists($this,$method)){
                    $this->$method($value);
                }
            }
        }

        /**
         * Récupère l'identifiant du type.
         *
         * @return int|null L'identifiant du type ou null si non défini.
         */
        public function getIdType(): ?int {
            return $this->idType;
        }

        /**
         * Définit l'identifiant du type.
         *
         * @param int|null $idType L'identifiant du type ou null si non défini.
         */
        public function setIdType(?int $idType) {
            $this->idType = $idType;
        }

        /**
         * Récupère le nom du type.
         *
         * @return string Le nom du type.
         */
        public function getNomType(): string {
            return $this->nomType;
        }

        /**
         * Définit le nom du type.
         *
         * @param string $nomType Le nom du type.
         */
        public function setNomType(string $nomType) {
            $this->nomType = $nomType;
        }

        /**
         * Récupère l'URL de l'image du type.
         *
         * @return string L'URL de l'image du type.
         */
        public function getUrlImg(): string {
            return $this->urlImg;
        }

        /**
         * Définit l'URL de l'image du type.
         *
         * @param string $urlImg L'URL de l'image du type.
         */
        public function setUrlImg(string $urlImg) {
            $this->urlImg = $urlImg;
        }
    }
?>
