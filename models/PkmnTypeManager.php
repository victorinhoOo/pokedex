<?php
    require_once('Model.php');
    require_once('PkmnType.php');

    /**
     * Gère les opérations liées aux types de Pokémon en interaction avec la base de données
     */
    class PkmnTypeManager extends Model {

        /**
         * Récupère la liste de tous les types de Pokémon depuis la base de données.
         *
         * @return array Un tableau contenant tous les types de Pokémon.
         */
        public function getAll(): array {
            $sql = "SELECT * FROM pkmn_type";
            $stmt = $this->execRequest($sql);
            $typeList = [];

            if ($stmt) {
                $typeList = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        
            $result = [];
            foreach ($typeList as &$typeData) {
                $result[] = new PkmnType($typeData); 
            }
            
            return $result;
        }

        /**
         * Récupère un type de Pokémon spécifique en utilisant son identifiant.
         *
         * @param int $idPkmnType L'identifiant du type de Pokémon à récupérer.
         * @return PkmnType|null Le type de Pokémon ou null s'il n'est pas trouvé.
         */
        public function getByID(int $idPkmnType): ?PkmnType {
            $sql = "SELECT * FROM pkmn_type WHERE idType = ?";
            $stmt = $this->execRequest($sql, [$idPkmnType]);

            if ($stmt) {
                $typeData = $stmt->fetch(PDO::FETCH_ASSOC);
                $result = null;

                if ($typeData) {
                    $result = new PkmnType($typeData);
                }
            }

            return $result;
        }

        /**
         * Récupère l'ID d'un type de Pokémon en utilisant son nom.
         *
         * @param string $nameType Le nom du type de Pokémon à rechercher.
         * @return int|null L'ID du type de Pokémon ou null s'il n'est pas trouvé.
         */
        public function getIdType(string $nameType): ?int {
            $sql = "SELECT idType FROM pkmn_type WHERE nomType = ?";
            $stmt = $this->execRequest($sql, [$nameType]);

            if ($stmt) {
                $idType = $stmt->fetchColumn();
                return $idType ? (int)$idType : null;
            }

            return null;
        }


        /**
         * Crée un nouveau type de Pokémon dans la base de données.
         *
         * @param PkmnType $pkmnType Le type de Pokémon à ajouter.
         * @return PkmnType Le nouveau type de Pokémon.
         */
        public function createPkmnType(PkmnType $pkmnType): PkmnType {
            $nom = $pkmnType->getNomType();
            $urlImg = $pkmnType->getUrlImg();
        
            $sql = "INSERT INTO pkmn_type (nomType, urlImg) VALUES (:nom, :urlImg)";
            $data = [":nom" => $nom, ":urlImg" => $urlImg];
            $stmt = $this->execRequest($sql, $data);
        
            return $pkmnType;
        }
        

        /**
         * Supprime un type de Pokémon de la base de données en utilisant son identifiant.
         *
         * @param int $idPkmnType L'identifiant du type de Pokémon à supprimer.
         * @return int 0 en cas d'erreur, 1 en cas de succès.
         */
        public function deletePkmnType(int $idPkmnType): int {
            $sql = "DELETE FROM pkmn_type WHERE idType = :id";
            $stmt = $this->execRequest($sql, [':id' => $idPkmnType]);

            return $stmt->rowCount();
        }

        /**
         * Modifie un type de Pokémon dans la base de données.
         *
         * @param PkmnType $pkmnType Le type de Pokémon à modifier.
         * @return int 0 en cas d'erreur, 1 en cas de succès.
         */
        public function editPkmnType(PkmnType $pkmnType): int {
            $idPkmnType = $pkmnType->getIdType();
            $nom = $pkmnType->getNomType();
            $urlImg = $pkmnType->getUrlImg();

            $sql = "UPDATE pkmn_type SET nomType = :nom, urlImg = :urlImg WHERE idType = :id";
            $data = [":nom" => $nom, ":urlImg" => $urlImg, ":id" => $idPkmnType];
            $stmt = $this->execRequest($sql, $data);

            return $stmt->rowCount();
        }
    }
?>